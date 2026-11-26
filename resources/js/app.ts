import Alpine from 'alpinejs';
import { env } from '@/config/env';
import { cn } from '@/utils/cn';

declare global {
    interface Window {
        Alpine: typeof Alpine;
        cn: typeof cn;
        appEnv: typeof env;
    }
}

window.Alpine = Alpine;
window.cn = cn;
window.appEnv = env;

Alpine.start();
