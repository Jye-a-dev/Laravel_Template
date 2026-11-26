# AGENTS.md — Architecture & Engineering Conventions

## 1. Laravel Slim Skeleton (Laravel 11/12/13+)

- Configure routing, middleware, and exception handling exclusively in `bootstrap/app.php`.
- NEVER create legacy `app/Http/Kernel.php`, `app/Console/Kernel.php`, or `app/Providers/RouteServiceProvider.php`.
- Keep `routes/web.php` (and `routes/api.php` if added) thin: map routes to Controllers without inline business logic.

## 2. Feature-Based Hybrid Structure (`app/Features/*`)

- Organize business domains under `app/Features/<FeatureName>/`:
    - `Actions/`: Single-purpose business action classes (`execute()`).
    - `Data/`: `final readonly` DTO classes (PHP 8.3+).
    - `Http/Controllers/`: Thin controllers accepting validated `FormRequest`, delegating to `Action`, returning `View` or `ApiResponse`.
    - `Http/Requests/`: `FormRequest` validation classes.
    - `Models/`: Feature-scoped Eloquent models (shared models like `User` stay in `app/Models/`).
- Place shared cross-cutting helpers and response wrappers in `app/Support/`.

## 3. Frontend Stack & Path Alias

- Use Blade Components (`<x-ui.*>`, `<x-layouts.*>`), Alpine.js, and Tailwind CSS v4 (`@tailwindcss/vite` + `@import "tailwindcss";` in `resources/css/app.css`, no `tailwind.config.js`).
- Entry point is `resources/js/app.ts` with TypeScript strict mode (`strict: true`, `noUncheckedIndexedAccess: true`) and path alias `@/*` -> `./resources/js/*`.
- Validate all `VITE_*` environment variables in `resources/js/config/env.ts` using Zod.
- Use `cn()` from `@/utils/cn` (`clsx` + `tailwind-merge`) for conditional classes.

## 4. Quality Gates & Git Workflow

- Run `npm run type-check`, `npm run lint`, and `npm run build` before finishing any task.
- Follow Conventional Commits (`feat:`, `fix:`, `chore:`, `docs:`, `refactor:`) enforced by Commitlint + Husky.
