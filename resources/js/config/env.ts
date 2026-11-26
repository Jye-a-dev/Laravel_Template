import { z } from 'zod';

const envSchema = z.object({
    VITE_APP_NAME: z.string().min(1).default('Laravel Template'),
    VITE_APP_URL: z.string().url().default('http://localhost:5000'),
    VITE_API_BASE_URL: z.string().url().default('http://localhost:5000/api'),
});

const parsed = envSchema.safeParse({
    VITE_APP_NAME: import.meta.env.VITE_APP_NAME || undefined,
    VITE_APP_URL: import.meta.env.VITE_APP_URL || undefined,
    VITE_API_BASE_URL: import.meta.env.VITE_API_BASE_URL || undefined,
});

if (!parsed.success) {
    console.error('Invalid Vite environment variables:', parsed.error.flatten().fieldErrors);
    throw new Error('Invalid Vite environment variables');
}

export const env = parsed.data;
