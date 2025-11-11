# ROADMAP - Modulo User

## Scopo del Progetto
Il modulo User gestisce l'intero sistema di autenticazione, autorizzazione e gestione utenti. Fornisce un sistema
multi-tenant con ruoli e permessi granulari, supporto per team e organizzazioni.

## Business Logic
- **Autenticazione Multi-Factor**: Login con email, OTP, social login
- **Autorizzazione Granulare**: Sistema di ruoli e permessi basato su Spatie Permission
- **Multi-Tenancy**: Supporto per organizzazioni e team
- **Profilazione Utenti**: Gestione profili completi con media
- **Audit Trail**: Logging completo delle attività utente
- **Sicurezza Avanzata**: Password policies, sessioni sicure, 2FA

## Architettura Tecnica

### Modelli Principali
- **User/BaseUser**: Utenti del sistema con autenticazione
- **Profile**: Profili utente estesi con media
- **Role**: Ruoli del sistema
- **Permission**: Permessi granulari
- **Team**: Organizzazioni e team
- **Tenant**: Multi-tenancy

### Servizi Core
- **AuthService**: Gestione autenticazione
- **PermissionService**: Gestione ruoli e permessi
- **TeamService**: Gestione team e organizzazioni
- **ProfileService**: Gestione profili utente

### Middleware e Guards
- **Auth Middleware**: Autenticazione richiesta
- **Role Middleware**: Controllo ruoli
- **Permission Middleware**: Controllo permessi
- **Tenant Middleware**: Isolamento multi-tenant

## Roadmap di Sviluppo

### Fase 1: Core Authentication (COMPLETATA)
- ✅ Sistema base di autenticazione
- ✅ Gestione utenti e profili
- ✅ Ruoli e permessi base
- ✅ Middleware di sicurezza

### Fase 2: Advanced Authorization (COMPLETATA)
- ✅ Sistema ruoli granulare
- ✅ Permessi dinamici
- ✅ Multi-tenancy
- ✅ Team management

### Fase 3: Security & Compliance (COMPLETATA)
- ✅ Password policies
- ✅ Session management
- ✅ Audit logging
- ✅ GDPR compliance

### Fase 4: User Experience (IN CORSO)
- 🔄 Social login integration
- 🔄 2FA implementation
- 🔄 Profile customization
- 🔄 Notification preferences

### Fase 5: Advanced Features (PIANIFICATA)
- 📋 SSO integration
- 📋 Advanced analytics
- 📋 User behavior tracking
- 📋 Automated user management

## Tecnologie Utilizzate
- **Authentication**: Laravel Passport, JWT
- **Authorization**: Spatie Laravel Permission
- **Multi-tenancy**: Stancl/Tenancy
- **Media**: Spatie Media Library
- **Social**: Laravel Socialite
- **Security**: Laravel Sanctum
- **Audit**: Spatie Activity Log

## Metriche di Successo
- **Security**: Zero security breaches
- **Performance**: < 100ms auth response
- **User Experience**: < 2 click per login
- **Compliance**: 100% GDPR compliant
- **Uptime**: 99.99% availability

## Prossimi Passi (Q4 2025 - Q1 2026)

### Q4 2025 (Ottobre - Dicembre) - CURRENT
1. ✅ PHPStan Livello 9: 0 errori su `Modules/` (COMPLETATO)
2. 🔄 2FA completo (TOTP + Recovery Codes) con policy per tenant/team (Filament v4 UI) - 60% completato
3. 🔄 Social Login (Google/Microsoft) con mapping ruoli e domini consentiti - 40% completato
4. 🔄 Performance auth: ridurre query su bootstrap, cache permessi per guard/tenant - 30% completato

### Q1 2026 (Gennaio - Marzo)
1. 📋 SSO (SAML/OIDC) con audit centralizzato e revoke sessions
2. 📋 Hardening sicurezza: passwordless opzionale, session fixation protection, device sessions mgmt
3. 📋 API authentication completa (JWT, OAuth2)
4. 📋 Advanced user analytics e behavior tracking

### Manutenzione Documentazione (continuativa)
- Aggiorna `BUSINESS_LOGIC_ANALYSIS.md` con flussi 2FA/SSO e sequence diagram
- Documenta azioni Filament profilo (es. `ChangeProfilePasswordAction`) e regole XotBase
- Collega dipendenze con `Modules/Fixcity/docs/ROADMAP.md` (notifiche, owner/responsible)

### Criteri di Accettazione
- Pannello Filament v4 allineato a regole LARAXOT (niente `->label()`/`->tooltip()`, metodi corretti)
- 2FA attivabile per tenant/team con recovery codes e test feature
- Social login con policy di dominio + mapping ruoli verificati
- Test E2E login/logout + force password change flow su profilo

### Collegamenti
- Docs modulo Tenant: `../../Tenant/docs/`
- Docs modulo CMS (integrazioni UI): `../../Cms/docs/`

## Team e Responsabilità
- **Security Lead**: Sicurezza e compliance
- **Backend Lead**: API e business logic
- **Frontend Lead**: UI/UX auth
- **DevOps**: Infrastruttura sicura
- **QA**: Security testing

## Risorse e Documentazione
- [Security Guidelines](./security.md)
- [API Documentation](./api-docs.md)
- [Database Schema](./database-schema.md)
- [Deployment Guide](./deployment.md)
- [Testing Strategy](./testing.md)







