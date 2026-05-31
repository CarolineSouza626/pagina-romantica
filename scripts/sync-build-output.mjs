import fs from 'node:fs';
import path from 'node:path';

const sourceDir = path.resolve('dist');
const targetDir = path.resolve('public/build');

if (!fs.existsSync(sourceDir)) {
  throw new Error(`Build output not found at ${sourceDir}`);
}

fs.rmSync(targetDir, { recursive: true, force: true });
fs.mkdirSync(path.dirname(targetDir), { recursive: true });
fs.cpSync(sourceDir, targetDir, { recursive: true });