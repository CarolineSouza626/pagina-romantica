import { cpSync, existsSync, mkdirSync } from 'fs';
import { join } from 'path';

const src = join(process.cwd(), 'public', 'images');
const dest = join(process.cwd(), 'dist', 'images');

if (!existsSync(src)) {
  console.error('Source not found:', src);
  process.exit(1);
}

mkdirSync(dest, { recursive: true });
cpSync(src, dest, { recursive: true });
console.log('Copied images from', src, 'to', dest);
