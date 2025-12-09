# Translation Conflict Resolution Prototype

## Overview
This document describes the prototype for resolving Git conflicts in Laravel translation files while preserving all translation content.

## Conflict Types Identified

### Type 1: Complete Structure Conflicts
**Example**: `Modules/User/lang/it/device.php`
- One version has rich structure with `tooltip`, `helper_text`, `actions`, `navigation`, etc.
- Other version has minimal structure with basic `label`, `placeholder`, `help` fields
- **Resolution Strategy**: Merge both structures, prioritizing the richer version while preserving unique content from minimal version

### Type 2: Partial Key Conflicts
**Example**: `Modules/User/lang/it/edit_role.php`, `permission.php`
- Some keys exist in one version but not in another
- **Resolution Strategy**: Add missing keys from both versions

### Type 3: Duplicate Sections
**Example**: `Modules/TechPlanner/lang/it/appointment.php`
- Same sections appear twice without conflict markers
- **Resolution Strategy**: Merge duplicate content, removing redundancy

## Resolution Algorithm

### Step 1: Parse Conflict Markers
- Identify git  markers
- Extract HEAD version, conflicting version, and any intermediate versions

### Step 2: Parse PHP Arrays
- Convert each version to associative arrays
- Handle both `array()` and `[]` syntax

### Step 3: Deep Merge Strategy
```php
function deepMergeTranslations($array1, $array2) {
    foreach ($array2 as $key => $value) {
        if (array_key_exists($key, $array1)) {
            if (is_array($array1[$key]) && is_array($value)) {
                $array1[$key] = deepMergeTranslations($array1[$key], $value);
            } else {
                // Prefer more detailed content (longer strings, richer structures)
                if (strlen($value) > strlen($array1[$key])) {
                    $array1[$key] = $value;
                }
            }
        } else {
            $array1[$key] = $value;
        }
    }
    return $array1;
}
```

### Step 4: Content Preservation Rules
1. **Never delete existing translations**
2. **Prefer richer content** (with tooltip, helper_text, etc.)
3. **Merge arrays deeply** rather than replacing
4. **Preserve unique keys** from both versions
5. **Maintain consistent formatting** (prefer modern array syntax `[]`)

## Implementation Examples

### Device.php Resolution
```php
// Merge rich HEAD version with minimal conflict version
// Keep: tooltip, helper_text, actions, navigation, sections, filters, messages
// Add: any unique translations from minimal version
```

### Edit_role.php Resolution
```php
// Original: ['view' => ['label' => 'view'], 'delete' => ['label' => 'delete']]
// Conflict: + ['cancel' => ['label' => 'cancel'], 'save' => ['label' => 'save']]
// Result: All four actions preserved
```

## Quality Assurance

### Validation Steps
1. **Syntax Check**: Ensure valid PHP array syntax
2. **Key Completeness**: Verify no translations are lost
3. **Structure Consistency**: Maintain expected array structure
4. **Translation Integrity**: Preserve semantic meaning

### Testing Protocol
1. Parse each resolved file as PHP
2. Compare key counts before/after resolution
3. Verify no content loss
4. Check for proper array formatting

## File Processing Order
1. Process files with obvious conflicts first (git markers)
2. Handle duplicate section files
3. Validate and format all processed files
4. Generate resolution report

## Output Format
- Use modern PHP array syntax `[]` instead of `array()`
- Maintain proper indentation (4 spaces)
- Include `declare(strict_types=1);` where present
- Preserve file structure and comments