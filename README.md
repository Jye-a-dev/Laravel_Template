# Laravel Template (Production-Ready Starter)

Template khởi tạo dự án Laravel hiện đại theo kiến trúc **Feature-Based Hybrid**, tối ưu cho cả **Solo Developer** và **Team**. Chỉ cần `git clone`, cấu hình `.env`, cài dependencies và bắt đầu code ngay với đầy đủ hàng rào kiểm soát chất lượng tự động.

## Tech Stack

| Thành phần                     | Công nghệ / Gói                              | Phiên bản (`composer.json` / `package.json`) |
| ------------------------------ | -------------------------------------------- | -------------------------------------------- |
| Backend Framework              | Laravel Framework                            | `^13.17`                                     |
| PHP Runtime                    | PHP                                          | `^8.3`                                       |
| Blade Icons                    | `mallardduck/blade-lucide-icons`             | `^2.0`                                       |
| Static Analysis (PHP)          | `larastan/larastan`                          | `^3.15`                                      |
| PHP Formatter                  | `laravel/pint`                               | `^1.27`                                      |
| Build Tool                     | Vite + `laravel-vite-plugin`                 | `^8.4.0` / `^3.2.1`                          |
| CSS Framework                  | Tailwind CSS v4 (`@tailwindcss/vite`)        | `^4.3.5`                                     |
| Frontend Language              | TypeScript (Strict Mode)                     | `^6.0.3`                                     |
| Reactivity                     | Alpine.js                                    | `^3.17.5`                                    |
| Env Validation                 | Zod                                          | `^4.6.7`                                     |
| Class Utilities                | `clsx` + `tailwind-merge`                    | `^2.1.1` / `^3.7.1`                          |
| JS/TS/Blade Linter & Formatter | ESLint + Prettier + Blade & Tailwind plugins | `^10.15.0` / `^3.10.1`                       |
| Git Hooks & Commit             | Husky + lint-staged + Commitlint             | `^9.1.7` / `^17.6.2` / `^21.2.4`             |

## Yêu cầu hệ thống

- **PHP**: `>= 8.3` (khuyến nghị bật `pdo_sqlite` hoặc `pdo_mysql` khi dùng database)
- **Composer**: `>= 2.x`
- **Node.js**: Phiên bản LTS theo `.nvmrc` (`22`)
- **VS Code Extensions** (đã khai báo trong `.vscode/extensions.json`):
    - `bmewburn.vscode-intelephense-client` (PHP Intelephense)
    - `onecentlin.laravel-blade` (Laravel Blade)
    - `bradlc.vscode-tailwindcss` (Tailwind CSS IntelliSense)
    - `dbaeumer.vscode-eslint` (ESLint)
    - `esbenp.prettier-vscode` (Prettier)

## Quick Start

```bash
git clone <repository-url>
cd lavarel_template
cp .env.example .env
composer install
php artisan key:generate
npm install
composer run dev
```

Mở trình duyệt tại: `http://localhost:5000`

## Biến môi trường (`.env`)

| Biến                | Mặc định                | Mô tả                                                                    |
| ------------------- | ----------------------- | ------------------------------------------------------------------------ |
| `APP_NAME`          | `"Laravel Template"`    | Tên ứng dụng hiển thị ở title và header                                  |
| `APP_ENV`           | `local`                 | Môi trường chạy (`local`, `staging`, `production`)                       |
| `APP_URL`           | `http://localhost:5000` | URL gốc của ứng dụng Laravel                                             |
| `SERVER_PORT`       | `5000`                  | Cổng chạy `php artisan serve` (qua `composer run dev`) và `vite preview` |
| `VITE_APP_NAME`     | `"${APP_NAME}"`         | Tên ứng dụng truyền xuống Vite (validate bởi Zod)                        |
| `VITE_APP_URL`      | `"${APP_URL}"`          | URL gốc phía client (validate bởi Zod)                                   |
| `VITE_API_BASE_URL` | `"${APP_URL}/api"`      | Base URL cho các lời gọi API phía client                                 |

Để đổi port mặc định từ `5000` sang port khác (ví dụ `8080`), chỉ cần sửa `SERVER_PORT=8080` và `APP_URL=http://localhost:8080` trong `.env`.

## Cấu trúc thư mục & Nguyên tắc phân chia code

```text
app/
├── Features/                   # Chia theo nghiệp vụ (mỗi module/team 1 thư mục riêng)
│   └── Example/
│       ├── Actions/            # Single-purpose business actions
│       ├── Data/               # Readonly DTOs (PHP 8.3+)
│       ├── Http/
│       │   ├── Controllers/    # Thin controllers (chỉ gọi Action & trả Response)
│       │   └── Requests/       # FormRequest validation
│       └── Models/             # Eloquent Models riêng của feature
├── Http/Middleware/            # Custom middleware dùng chung
├── Models/                     # Shared core models (User.php, ...)
├── Providers/                  # Service providers (AppServiceProvider.php)
└── Support/                    # Global helpers & ApiResponse wrapper
resources/
├── css/app.css                 # @import "tailwindcss"; (Tailwind CSS v4)
├── js/
│   ├── config/env.ts           # Validate & export VITE_* bằng Zod
│   ├── utils/cn.ts             # Helper gộp class Tailwind (clsx + tailwind-merge)
│   └── app.ts                  # Entry point Vite + khởi tạo Alpine.js
└── views/
    ├── components/ui/          # Reusable Blade UI components (<x-ui.*>)
    ├── features/example/       # Blade views riêng của feature Example
    ├── layouts/app.blade.php   # Root layout (<x-layouts.app>)
    └── pages/home.blade.php    # Trang chủ mẫu
```

- **`routes/`**: Chỉ định nghĩa endpoint và trỏ tới Controller, không viết closure chứa logic nghiệp vụ.
- **`app/Features/<Feature>/`**: Đặt toàn bộ Controllers, FormRequests, Actions, DTOs và Models thuộc về một nghiệp vụ cụ thể.
- **`resources/views/components/ui/`**: Đặt các UI component tái sử dụng toàn dự án (`button`, `input`, `modal`...).
- **`app/Support/`**: Đặt các helper dùng chung như `ApiResponse`.

## Scripts

| Lệnh                 | Mô tả                                                                          |
| -------------------- | ------------------------------------------------------------------------------ |
| `composer run dev`   | Chạy song song Laravel server (đọc `SERVER_PORT` từ `.env`) và Vite dev server |
| `npm run dev`        | Chạy song song Laravel server (đọc `SERVER_PORT` từ `.env`) và Vite dev server |
| `npm run build`      | Build assets production vào `public/build`                                     |
| `npm run preview`    | Xem thử bản build Vite trên port `SERVER_PORT`                                 |
| `npm run type-check` | Chạy `tsc --noEmit` và Larastan (`phpstan analyse`)                            |
| `npm run lint`       | Kiểm tra ESLint và Laravel Pint (`pint --test`)                                |
| `npm run format`     | Tự động format toàn bộ code bằng Prettier và Laravel Pint                      |

## Quy ước Git Commit (Conventional Commits)

Mọi commit đều được kiểm tra tự động qua Husky (`pre-commit` chạy `lint-staged`, `commit-msg` chạy `commitlint`):

- `feat: ...` — Thêm tính năng mới
- `fix: ...` — Sửa lỗi
- `refactor: ...` — Tái cấu trúc code
- `chore: ...` — Cập nhật cấu hình, dependencies, tooling
- `docs: ...` — Cập nhật tài liệu
