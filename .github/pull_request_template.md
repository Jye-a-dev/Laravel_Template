## Mô tả thay đổi

- Tóm tắt ngắn gọn mục đích của PR và các thay đổi chính.

## Loại thay đổi

- [ ] `feat`: Tính năng mới
- [ ] `fix`: Sửa lỗi
- [ ] `refactor`: Tái cấu trúc code (không đổi hành vi)
- [ ] `chore`: Cập nhật config, dependencies, tooling
- [ ] `docs`: Tài liệu

## Checklist trước khi merge

- [ ] Đã chạy `npm run type-check` (TypeScript + Larastan) không có lỗi
- [ ] Đã chạy `npm run lint` (ESLint + Laravel Pint) pass
- [ ] Đã chạy `npm run build` thành công
- [ ] Tuân thủ kiến trúc `app/Features/*` (Thin Routes & Controllers)
