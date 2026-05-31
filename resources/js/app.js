import '../css/app.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('loveTimer', (startedAt) => ({
  startedAt: new Date(startedAt),
  now: new Date(),
  tick: null,
  init() {
    this.tick = setInterval(() => {
      this.now = new Date();
    }, 1000);
  },
  get diff() {
    const total = Math.max(0, this.now - this.startedAt);
    const seconds = Math.floor(total / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);
    const months = Math.floor(days / 30.4375);
    const years = Math.floor(months / 12);

    return {
      years,
      months: months % 12,
      days: days % 30,
      hours: hours % 24,
      seconds: seconds % 60,
    };
  },
}));

Alpine.data('playlistPlayer', (tracks = []) => ({
  tracks,
  currentIndex: 0,
  isPlaying: false,
  audio: null,
  progress: 0,
  volume: 0.75,
  init() {
    this.audio = new Audio();
    this.audio.preload = 'metadata';
    this.audio.volume = this.volume;

    this.audio.addEventListener('timeupdate', () => {
      this.progress = this.audio.duration ? (this.audio.currentTime / this.audio.duration) * 100 : 0;
    });

    this.audio.addEventListener('ended', () => this.next());
    this.loadTrack(0, false);
  },
  loadTrack(index, autoplay = true) {
    if (!this.tracks.length) return;

    this.currentIndex = (index + this.tracks.length) % this.tracks.length;
    this.audio.src = this.tracks[this.currentIndex].url;
    this.audio.currentTime = 0;

    if (autoplay) {
      this.play();
    }
  },
  play() {
    this.audio.play();
    this.isPlaying = true;
  },
  pause() {
    this.audio.pause();
    this.isPlaying = false;
  },
  toggle() {
    this.isPlaying ? this.pause() : this.play();
  },
  next() {
    this.loadTrack(this.currentIndex + 1);
  },
  previous() {
    this.loadTrack(this.currentIndex - 1);
  },
  seek(event) {
    const percent = Number(event.target.value);
    if (!this.audio.duration) return;
    this.audio.currentTime = (percent / 100) * this.audio.duration;
  },
  setVolume(event) {
    this.volume = Number(event.target.value);
    this.audio.volume = this.volume;
  },
}));

Alpine.data('secretReveal', () => ({
  revealed: false,
  toggle() {
    this.revealed = !this.revealed;
  },
}));

Alpine.data('heroGlow', () => ({
  stars: Array.from({ length: 18 }, (_, i) => ({
    left: `${(i * 11) % 100}%`,
    top: `${(i * 17) % 100}%`,
    delay: `${(i % 8) * 0.4}s`,
  })),
}));

document.addEventListener('DOMContentLoaded', () => {
  setTimeout(() => {
    document.body.classList.add('is-loaded');
  }, 1200);
});

Alpine.start();
