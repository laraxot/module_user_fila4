<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Override;
use Exception;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
use Exception;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;

class UserTypeRegistrationsChartWidget extends XotBaseChartWidget
{
<<<<<<< HEAD
    protected null|string $heading = null;
    protected static null|int $sort = 1;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected null|string $heading = null;
    protected static null|int $sort = 1;
=======
    protected ?string $heading = null;
    protected static ?int $sort = 1;
>>>>>>> a12f125f4a (.)
=======
    protected null|string $heading = null;
    protected static null|int $sort = 1;
>>>>>>> b93ef594b4 (.)
=======
    protected static ?string $heading = null;
    protected static ?int $sort = 1;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    protected static bool $isLazy = true;

    public string $model;

<<<<<<< HEAD
    #[Override]
    public function getHeading(): null|string
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    public function getHeading(): null|string
=======
    public function getHeading(): ?string
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function getHeading(): null|string
>>>>>>> b93ef594b4 (.)
=======
    public function getHeading(): ?string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    {
        return static::transClass($this->model, 'widgets.user_type_registrations_chart.heading');
    }

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    protected function getData(): array
    {
        // Debug: Verifica se i filtri sono disponibili
        $filters = $this->getFilters();

        // Accesso sicuro ai filtri della pagina con fallback appropriati
        $startDate = null;
        $endDate = null;

        // Verifica se i filtri sono disponibili e validi
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        if (is_array($filters) && !empty($filters)) {
            /** @phpstan-ignore-next-line */
            $startDate = !empty($filters['startDate']) ? Carbon::parse($filters['startDate']) : null;
            /** @phpstan-ignore-next-line */
            $endDate = !empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
<<<<<<< HEAD
=======
=======
        if (is_array($filters) && ! empty($filters)) {
=======
        if (is_array($filters) && !empty($filters)) {
>>>>>>> b93ef594b4 (.)
            /** @phpstan-ignore-next-line */
            $startDate = !empty($filters['startDate']) ? Carbon::parse($filters['startDate']) : null;
            /** @phpstan-ignore-next-line */
<<<<<<< HEAD
            $endDate = ! empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
>>>>>>> a12f125f4a (.)
=======
            $endDate = !empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
>>>>>>> b93ef594b4 (.)
=======
        if (is_array($filters) && ! empty($filters)) {
            /** @phpstan-ignore-next-line */
            $startDate = ! empty($filters['startDate']) ? Carbon::parse($filters['startDate']) : null;
            /** @phpstan-ignore-next-line */
            $endDate = ! empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        // Fallback ai valori di default se i filtri non sono disponibili
        if (null === $startDate) {
            $startDate = now()->subDays(30);
        }
        if (null === $endDate) {
            $endDate = now();
        }

        try {
            $data = Trend::model($this->model)
                ->between(
                    start: $startDate,
                    end: $endDate,
                )
                ->perDay()
                ->count();

            return [
                'datasets' => [
                    [
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
<<<<<<< HEAD
                        'data' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
                            ? $value->aggregate
                            : 0),
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                        'data' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
                            ? $value->aggregate
                            : 0),
=======
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue ? $value->aggregate : 0),
>>>>>>> a12f125f4a (.)
=======
                        'data' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
                            ? $value->aggregate
                            : 0),
>>>>>>> b93ef594b4 (.)
=======
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue ? $value->aggregate : 0),
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
                        'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
<<<<<<< HEAD
                'labels' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
        } catch (Exception $e) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                'labels' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
=======
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue ? \Carbon\Carbon::parse($value->date)->format('d/m') : ''),
>>>>>>> a12f125f4a (.)
=======
                'labels' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
>>>>>>> b93ef594b4 (.)
            ];
        } catch (Exception $e) {
=======
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue ? \Carbon\Carbon::parse($value->date)->format('d/m') : ''),
            ];
        } catch (\Exception $e) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Fallback appropriato senza logging inutile
            return [
                'datasets' => [
                    [
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
                        'data' => [],
                        'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => [],
            ];
        }
    }

<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    protected function getType(): string
    {
        return 'line';
    }
}
