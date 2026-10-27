
<script setup>
import { ref, onMounted } from 'vue'

const menuOpen = ref(false)
const portfolio = ref(null)
const apiError = ref(false)
const loading = ref(true)

const skills = [
  'HTML & CSS',
  'JavaScript',
  'Vue.js',
  'PHP',
  'Laravel',
  'MySQL',
  'Git & GitHub',
  'REST APIs',
]

const projects = [
  {
    number: '01',
    title: 'Personal Portfolio Website',
    description:
      'A responsive personal portfolio built with Vue 3 and Laravel to showcase my skills, projects, and developer journey.',
    technologies: ['Vue 3', 'Laravel', 'REST API'],
    status: 'In development',
  },
  {
    number: '02',
    title: 'Full-Stack Web Application',
    description:
      'A planned full-stack application to practise frontend development, backend APIs, database operations, and authentication.',
    technologies: ['Vue 3', 'Laravel', 'MySQL'],
    status: 'Planned project',
  },
  {
    number: '03',
    title: 'Interactive Web Application',
    description:
      'A planned interactive application focused on JavaScript fundamentals, responsive UI, and API integration.',
    technologies: ['JavaScript', 'Vue 3', 'REST API'],
    status: 'Planned project',
  },
]

const socialLinks = [
  {
    name: 'GitHub',
    url: 'https://github.com/Zain-Sanwar-Ahmed',
  },
  {
    name: 'LinkedIn',
    url: 'https://www.linkedin.com/in/zain-sanwar-ahmed-6562291ab/',
  },
]

onMounted(async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/portfolio')

    if (!response.ok) {
      throw new Error('Could not load portfolio information.')
    }

    portfolio.value = await response.json()
  } catch (error) {
    console.error('Portfolio API error:', error)
    apiError.value = true
  } finally {
    loading.value = false
  }
})
</script>

<template>
  <div class="site-wrapper" id="home">
    <header class="navbar">
      <a class="logo" href="#home" @click="menuOpen = false">
        zain<span>.dev</span>
      </a>

      <button
        class="menu-toggle"
        type="button"
        :aria-expanded="menuOpen"
        aria-label="Toggle navigation menu"
        @click="menuOpen = !menuOpen"
      >
        {{ menuOpen ? '✕' : '☰' }}
      </button>

      <nav :class="{ 'nav-open': menuOpen }">
        <a href="#about" @click="menuOpen = false">About</a>
        <a href="#skills" @click="menuOpen = false">Skills</a>
        <a href="#projects" @click="menuOpen = false">Projects</a>
        <a
          href="#contact"
          class="nav-contact"
          @click="menuOpen = false"
        >
          Contact me ↗
        </a>
      </nav>
    </header>

    <main>
      <section class="hero section-container">
        <div class="hero-content">
          <div class="availability">
            <span class="status-dot"></span>
            <span>OPEN TO OPPORTUNITIES</span>
          </div>

          <p class="eyebrow">HELLO, I'M</p>

          <h1>
            Zain Sanwar
            <span>Ahmed.</span>
          </h1>

          <h2>
            {{ portfolio?.title || 'Aspiring Full-Stack Developer' }}
          </h2>

          <p class="hero-description">
            I'm building my skills in modern web development and creating
            practical projects with Vue.js and Laravel. I'm eager to learn,
            solve problems, and grow as a software developer.
          </p>

          <p class="location">
            <span>⌖</span>
            {{ portfolio?.location || 'Dhaka, Bangladesh' }}
          </p>

          <div class="hero-actions">
            <a href="#projects" class="button button-primary">
              Explore my work <span>↘</span>
            </a>

            <a href="#contact" class="button button-secondary">
              Get in touch
            </a>
          </div>

          <div class="social-shortcuts">
            <a
              v-for="social in socialLinks"
              :key="social.name"
              :href="social.url"
              target="_blank"
              rel="noopener noreferrer"
            >
              {{ social.name }} ↗
            </a>
          </div>
        </div>

        <div class="hero-visual">
          <div class="code-card">
            <div class="code-card-header">
              <div class="window-dots">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <span class="file-label">developer.js</span>
              <span class="file-menu">•••</span>
            </div>

            <div class="code-content">
              <p><span class="line-number">01</span> <span class="code-purple">const</span> developer = {</p>
              <p><span class="line-number">02</span> &nbsp; name: <span class="code-green">'Zain Ahmed'</span>,</p>
              <p><span class="line-number">03</span> &nbsp; role: <span class="code-green">'Full-Stack Developer'</span>,</p>
              <p><span class="line-number">04</span> &nbsp; location: <span class="code-green">'Dhaka, BD'</span>,</p>
              <p><span class="line-number">05</span> &nbsp; skills: [</p>
              <p><span class="line-number">06</span> &nbsp; &nbsp; <span class="code-green">'Vue.js'</span>,</p>
              <p><span class="line-number">07</span> &nbsp; &nbsp; <span class="code-green">'Laravel'</span>,</p>
              <p><span class="line-number">08</span> &nbsp; &nbsp; <span class="code-green">'JavaScript'</span></p>
              <p><span class="line-number">09</span> &nbsp; ],</p>
              <p><span class="line-number">10</span> &nbsp; learning: <span class="code-blue">true</span>,</p>
              <p><span class="line-number">11</span> &nbsp; passion: <span class="code-green">'Building things'</span></p>
              <p><span class="line-number">12</span> };</p>
              <p class="code-comment"><span class="line-number">13</span> // Always learning, always building.</p>
            </div>

            <div class="code-card-footer">
              <span><span class="terminal-dot"></span> Ready to build</span>
              <span>UTF-8</span>
            </div>
          </div>

          <div class="floating-badge badge-vue">
            <span class="badge-symbol">V</span>
            <span>Vue.js</span>
          </div>

          <div class="floating-badge badge-laravel">
            <span class="badge-symbol">L</span>
            <span>Laravel</span>
          </div>

          <div class="visual-glow"></div>
        </div>

        <a href="#about" class="scroll-indicator">
          <span class="scroll-line"></span>
          SCROLL TO EXPLORE
        </a>
      </section>

      <section id="about" class="section-container content-section">
        <div class="section-heading">
          <p class="eyebrow">01 / ABOUT ME</p>
          <h2>A developer in the making.</h2>
        </div>

        <div class="about-grid">
          <div class="about-copy">
            <p>
              I'm an aspiring software developer based in Dhaka, Bangladesh,
              working toward becoming a capable full-stack web developer.
            </p>

            <p>
              I enjoy learning how websites work, connecting frontend
              interfaces to backend APIs, and turning ideas into practical
              applications. I'm focused on strengthening my fundamentals
              through hands-on practice and projects.
            </p>

            <p>
              My goal is to join a development team where I can contribute,
              learn from experienced developers, and continue improving.
            </p>
          </div>

          <div class="about-details">
            <div class="detail-card">
              <span class="detail-icon">⌘</span>
              <div>
                <h3>Frontend</h3>
                <p>Building responsive interfaces with Vue.js.</p>
              </div>
            </div>

            <div class="detail-card">
              <span class="detail-icon">⌘</span>
              <div>
                <h3>Backend</h3>
                <p>Learning server-side development with Laravel and PHP.</p>
              </div>
            </div>

            <div class="detail-card">
              <span class="detail-icon">↗</span>
              <div>
                <h3>Always learning</h3>
                <p>Improving through practice and real projects.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="skills" class="section-container content-section">
        <div class="section-heading">
          <p class="eyebrow">02 / TECHNICAL SKILLS</p>
          <h2>Tools I'm working with.</h2>
          <p class="section-description">
            Technologies I'm learning and practising as I grow as a developer.
          </p>
        </div>

        <div class="skills-grid">
          <div
            v-for="(skill, index) in skills"
            :key="skill"
            class="skill-card"
          >
            <span class="skill-number">
              {{ String(index + 1).padStart(2, '0') }}
            </span>
            <span>{{ skill }}</span>
            <span class="skill-arrow">↗</span>
          </div>
        </div>

        <p class="skills-note">
          Skill levels develop with practice. This list reflects my learning
          focus, not a claim of expert proficiency in every technology.
        </p>
      </section>

      <section id="projects" class="section-container content-section">
        <div class="section-heading projects-heading">
          <div>
            <p class="eyebrow">03 / SELECTED PROJECTS</p>
            <h2>Things I'm building.</h2>
          </div>
          <span class="project-count">03 CONCEPTS</span>
        </div>

        <div class="projects-grid">
          <article
            v-for="project in projects"
            :key="project.number"
            class="project-card"
          >
            <div class="project-top">
              <span class="project-number">{{ project.number }}</span>
              <span class="project-status">{{ project.status }}</span>
            </div>

            <div class="project-art">
              <span class="art-bracket">&lt;</span>
              <span class="art-code">/</span>
              <span class="art-bracket">&gt;</span>
            </div>

            <h3>{{ project.title }}</h3>
            <p>{{ project.description }}</p>

            <div class="technology-list">
              <span
                v-for="technology in project.technologies"
                :key="technology"
              >
                {{ technology }}
              </span>
            </div>
          </article>
        </div>

        <p class="projects-note">
          These entries include planned work. I'll replace them with completed
          projects and their source-code links as I build and publish them.
        </p>
      </section>

      <section id="contact" class="section-container contact-section">
        <p class="eyebrow">04 / GET IN TOUCH</p>
        <h2>Have an opportunity in mind?</h2>

        <p class="contact-description">
          I'm interested in connecting with developers, collaborating on
          projects, and exploring suitable junior developer opportunities.
        </p>

        <a
          class="button button-primary contact-button"
          href="mailto:zainsanwarahmed@gmail.com"
        >
          Send me an email <span>↗</span>
        </a>

        <a
          class="contact-email"
          href="mailto:zainsanwarahmed@gmail.com"
        >
          zainsanwarahmed@gmail.com
        </a>

        <div class="contact-socials">
          <a
            v-for="social in socialLinks"
            :key="social.name"
            :href="social.url"
            target="_blank"
            rel="noopener noreferrer"
          >
            Visit my {{ social.name }} profile ↗
          </a>
        </div>
      </section>

      <section v-if="loading || apiError || portfolio" class="api-status">
        <p v-if="loading" class="api-message">
          Connecting to the Laravel backend...
        </p>

        <p v-else-if="apiError" class="api-message api-error">
          The Laravel API is currently unavailable. The portfolio is still
          displayed using its default information.
        </p>

        <p v-else class="api-message api-success">
          <span class="status-dot"></span>
          Connected to the Laravel API successfully.
        </p>
      </section>
    </main>

    <footer class="footer">
      <a class="logo" href="#home">zain<span>.dev</span></a>

      <p>Designed &amp; built with Vue.js and Laravel.</p>

      <div class="footer-links">
        <a
          v-for="social in socialLinks"
          :key="social.name"
          :href="social.url"
          target="_blank"
          rel="noopener noreferrer"
        >
          {{ social.name }} ↗
        </a>

        <a href="#home" class="back-to-top">Back to top ↑</a>
      </div>
    </footer>
  </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700;800&display=swap');

:root {
  font-family: 'Inter', sans-serif;
  color: #f3f4fb;
  background: #080b14;
  font-synthesis: none;
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;

  --background: #080b14;
  --surface: #0e1220;
  --surface-light: #12182a;
  --border: #222940;
  --text: #f3f4fb;
  --muted: #929bb3;
  --blue: #7791ff;
  --violet: #a78bfa;
  --green: #72e6b0;
}

* {
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
  scroll-padding-top: 90px;
}

body {
  margin: 0;
  min-width: 320px;
  background:
    radial-gradient(ellipse at 75% 10%, #14152a 0%, transparent 35%),
    var(--background);
}

body,
button,
a {
  font-family: 'Inter', sans-serif;
}

a {
  color: inherit;
  text-decoration: none;
}

button {
  font: inherit;
}

button:focus-visible,
a:focus-visible {
  outline: 2px solid var(--blue);
  outline-offset: 4px;
}

.site-wrapper {
  overflow: hidden;
}

.section-container {
  width: min(1120px, calc(100% - 48px));
  margin-inline: auto;
}

.navbar {
  min-height: 84px;
  width: min(1120px, calc(100% - 48px));
  margin-inline: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid rgba(146, 155, 179, 0.12);
}

.logo {
  font-size: 1.35rem;
  font-weight: 800;
  letter-spacing: -1px;
}

.logo span {
  color: var(--blue);
}

.navbar nav {
  display: flex;
  align-items: center;
  gap: 34px;
}

.navbar nav a {
  color: var(--muted);
  font-size: 0.83rem;
  transition: color 0.2s ease;
}

.navbar nav a:hover {
  color: var(--text);
}

.navbar nav .nav-contact {
  padding: 12px 17px;
  color: var(--text);
  border: 1px solid #343c58;
  border-radius: 8px;
}

.navbar nav .nav-contact:hover {
  border-color: var(--blue);
}

.menu-toggle {
  display: none;
  border: 1px solid var(--border);
  border-radius: 8px;
  background: var(--surface);
  color: var(--text);
  padding: 8px 12px;
  cursor: pointer;
}

.hero {
  min-height: 650px;
  position: relative;
  display: grid;
  grid-template-columns: 1.05fr 0.95fr;
  align-items: center;
  gap: 50px;
  padding-top: 55px;
  padding-bottom: 105px;
}

.hero-content {
  position: relative;
  z-index: 2;
}

.availability {
  display: inline-flex;
  align-items: center;
  gap: 9px;
  padding: 9px 12px;
  margin-bottom: 32px;
  color: #aab4ce;
  border: 1px solid #26334a;
  border-radius: 30px;
  background: rgba(15, 25, 40, 0.7);
  font-family: 'DM Mono', monospace;
  font-size: 0.66rem;
  letter-spacing: 0.6px;
}

.status-dot,
.terminal-dot {
  display: inline-block;
  width: 7px;
  height: 7px;
  flex-shrink: 0;
  border-radius: 50%;
  background: var(--green);
  box-shadow: 0 0 12px rgba(114, 230, 176, 0.4);
}

.eyebrow {
  color: var(--blue);
  font-family: 'DM Mono', monospace;
  font-size: 0.74rem;
  letter-spacing: 2px;
}

.hero h1 {
  margin: 13px 0 18px;
  font-size: clamp(3rem, 5.4vw, 5.1rem);
  line-height: 1.05;
  letter-spacing: -4px;
  font-weight: 800;
}

.hero h1 span {
  display: block;
  color: var(--blue);
}

.hero h2 {
  margin: 0 0 18px;
  color: #d4d9e8;
  font-size: 1.2rem;
  font-weight: 500;
}

.hero-description {
  max-width: 475px;
  color: var(--muted);
  font-size: 0.96rem;
  line-height: 1.9;
}

.location {
  display: flex;
  align-items: center;
  gap: 8px;
  color: #a6aec4;
  font-size: 0.84rem;
}

.location span {
  color: var(--blue);
  font-size: 1.2rem;
}

.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 13px;
  margin-top: 28px;
}

.button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  padding: 14px 19px;
  border: 1px solid transparent;
  border-radius: 8px;
  font-size: 0.84rem;
  font-weight: 600;
  transition:
    transform 0.2s ease,
    background 0.2s ease,
    border-color 0.2s ease;
}

.button:hover {
  transform: translateY(-2px);
}

.button-primary {
  background: var(--blue);
  color: #090d1a;
}

.button-primary:hover {
  background: #94a7ff;
}

.button-secondary {
  border-color: #343c58;
  color: var(--text);
  background: rgba(14, 18, 32, 0.5);
}

.button-secondary:hover {
  border-color: var(--blue);
}

.social-shortcuts {
  display: flex;
  flex-wrap: wrap;
  gap: 22px;
  margin-top: 27px;
}

.social-shortcuts a {
  color: #a8b7ff;
  font-size: 0.8rem;
}

.social-shortcuts a:hover {
  color: white;
}

.hero-visual {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 0;
  padding: 25px 0;
}

.code-card {
  position: relative;
  z-index: 1;
  width: 100%;
  max-width: 475px;
  overflow: hidden;
  border: 1px solid #2b3451;
  border-radius: 13px;
  background: rgba(14, 18, 32, 0.96);
  box-shadow: 0 25px 90px rgba(0, 0, 0, 0.35);
  transform: rotate(1deg);
}

.code-card-header,
.code-card-footer {
  min-height: 47px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 17px;
  border-bottom: 1px solid #242b40;
}

.window-dots {
  display: flex;
  gap: 6px;
}

.window-dots span {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #4b536a;
}

.window-dots span:first-child {
  background: #ff7d87;
}

.window-dots span:nth-child(2) {
  background: #f6ca78;
}

.window-dots span:nth-child(3) {
  background: #7edbb1;
}

.file-label,
.file-menu,
.code-card-footer {
  color: #75809c;
  font-family: 'DM Mono', monospace;
  font-size: 0.68rem;
}

.code-content {
  padding: 21px 15px 23px;
  overflow-x: auto;
  font-family: 'DM Mono', monospace;
  font-size: clamp(0.65rem, 1.1vw, 0.79rem);
  line-height: 2.15;
}

.code-content p {
  width: max-content;
  min-width: 100%;
  margin: 0;
  white-space: pre;
}

.line-number {
  display: inline-block;
  width: 29px;
  color: #4f5873;
  user-select: none;
}

.code-purple {
  color: #c6a4ff;
}

.code-green {
  color: #85dfb5;
}

.code-blue {
  color: #82b7ff;
}

.code-comment {
  color: #65708c;
}

.code-card-footer {
  border-top: 1px solid #242b40;
  border-bottom: 0;
}

.code-card-footer span:first-child {
  display: flex;
  align-items: center;
  gap: 8px;
}

.terminal-dot {
  width: 6px;
  height: 6px;
}

.floating-badge {
  position: absolute;
  z-index: 2;
  display: flex;
  align-items: center;
  gap: 9px;
  padding: 12px 15px;
  border: 1px solid #333c59;
  border-radius: 10px;
  background: #141a2b;
  color: #e7eafd;
  font-size: 0.78rem;
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
}

.badge-vue {
  top: 9%;
  right: -3%;
}

.badge-laravel {
  bottom: 8%;
  left: -5%;
}

.badge-symbol {
  display: grid;
  place-items: center;
  width: 23px;
  height: 23px;
  border-radius: 6px;
  background: #243455;
  color: #a6b5ff;
  font-family: 'DM Mono', monospace;
  font-weight: 700;
}

.visual-glow {
  position: absolute;
  width: 80%;
  height: 80%;
  border-radius: 50%;
  background: rgba(92, 92, 255, 0.13);
  filter: blur(85px);
}

.scroll-indicator {
  position: absolute;
  bottom: 32px;
  left: 0;
  display: flex;
  align-items: center;
  gap: 12px;
  color: #7b849e;
  font-family: 'DM Mono', monospace;
  font-size: 0.64rem;
  letter-spacing: 1px;
}

.scroll-line {
  width: 33px;
  height: 1px;
  background: var(--blue);
}

.content-section {
  padding-top: 100px;
  padding-bottom: 45px;
  border-top: 1px solid rgba(146, 155, 179, 0.12);
}

.section-heading {
  max-width: 650px;
  margin-bottom: 38px;
}

.section-heading .eyebrow {
  margin-bottom: 15px;
}

.section-heading h2,
.contact-section h2 {
  margin: 0;
  font-size: clamp(2rem, 4vw, 3rem);
  letter-spacing: -1.5px;
  line-height: 1.2;
}

.section-description {
  margin-top: 15px;
  color: var(--muted);
  line-height: 1.8;
}

.about-grid {
  display: grid;
  grid-template-columns: 1fr 0.8fr;
  gap: 70px;
}

.about-copy p {
  color: #a4acc1;
  font-size: 0.94rem;
  line-height: 1.95;
}

.about-details {
  display: grid;
  gap: 13px;
}

.detail-card {
  display: flex;
  gap: 15px;
  padding: 19px;
  border: 1px solid var(--border);
  border-radius: 10px;
  background: rgba(14, 18, 32, 0.65);
}

.detail-icon {
  display: grid;
  place-items: center;
  width: 36px;
  height: 36px;
  flex-shrink: 0;
  border-radius: 8px;
  background: #1b2340;
  color: var(--blue);
}

.detail-card h3 {
  margin: 0 0 7px;
  font-size: 0.9rem;
}

.detail-card p {
  margin: 0;
  color: var(--muted);
  font-size: 0.8rem;
  line-height: 1.7;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 13px;
}

.skill-card {
  display: flex;
  align-items: center;
  gap: 12px;
  min-width: 0;
  padding: 19px 15px;
  border: 1px solid var(--border);
  border-radius: 9px;
  background: rgba(14, 18, 32, 0.65);
  font-size: 0.84rem;
  transition:
    border-color 0.2s ease,
    transform 0.2s ease;
}

.skill-card:hover {
  transform: translateY(-3px);
  border-color: #515e8a;
}

.skill-number {
  color: #727e9c;
  font-family: 'DM Mono', monospace;
  font-size: 0.68rem;
}

.skill-arrow {
  margin-left: auto;
  color: var(--blue);
}

.skills-note,
.projects-note {
  margin-top: 20px;
  color: #7f89a2;
  font-size: 0.78rem;
  line-height: 1.8;
}

.projects-heading {
  max-width: none;
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 20px;
}

.project-count {
  padding: 8px 10px;
  border: 1px solid var(--border);
  border-radius: 6px;
  color: var(--muted);
  font-family: 'DM Mono', monospace;
  font-size: 0.65rem;
  white-space: nowrap;
}

.projects-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 18px;
}

.project-card {
  min-width: 0;
  padding: 21px;
  border: 1px solid var(--border);
  border-radius: 12px;
  background: rgba(14, 18, 32, 0.72);
  transition:
    transform 0.2s ease,
    border-color 0.2s ease;
}

.project-card:hover {
  transform: translateY(-4px);
  border-color: #47537b;
}

.project-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 8px;
}

.project-number {
  color: var(--blue);
  font-family: 'DM Mono', monospace;
  font-size: 0.75rem;
}

.project-status {
  color: #aeb8d3;
  font-size: 0.63rem;
  text-align: right;
}

.project-art {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 13px;
  min-height: 145px;
  margin: 22px 0;
  border: 1px solid #232c46;
  border-radius: 8px;
  background:
    radial-gradient(ellipse at center, rgba(91, 102, 204, 0.18), transparent 70%),
    #0b0f1c;
  font-family: 'DM Mono', monospace;
  font-size: 3rem;
}

.art-bracket {
  color: #8399ff;
}

.art-code {
  color: #b59aff;
}

.project-card h3 {
  margin: 0 0 12px;
  font-size: 1.02rem;
  line-height: 1.5;
}

.project-card > p {
  min-height: 100px;
  margin: 0;
  color: var(--muted);
  font-size: 0.81rem;
  line-height: 1.85;
}

.technology-list {
  display: flex;
  flex-wrap: wrap;
  gap: 7px;
  margin-top: 18px;
}

.technology-list span {
  padding: 6px 8px;
  border: 1px solid #29314b;
  border-radius: 5px;
  color: #aeb9dc;
  font-family: 'DM Mono', monospace;
  font-size: 0.62rem;
}

.contact-section {
  margin-top: 80px;
  margin-bottom: 70px;
  padding: 65px 30px;
  border: 1px solid #2a3350;
  border-radius: 15px;
  background:
    radial-gradient(ellipse at 50% 0%, rgba(98, 106, 255, 0.14), transparent 65%),
    #0e1220;
  text-align: center;
}

.contact-section .eyebrow {
  margin-bottom: 20px;
}

.contact-description {
  max-width: 570px;
  margin: 20px auto 28px;
  color: var(--muted);
  font-size: 0.9rem;
  line-height: 1.9;
}

.contact-button {
  margin-bottom: 19px;
}

.contact-email {
  display: block;
  width: fit-content;
  margin: 0 auto;
  color: #a8b7ff;
  font-size: 0.83rem;
}

.contact-socials {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
  margin-top: 25px;
}

.contact-socials a {
  color: var(--muted);
  font-size: 0.8rem;
}

.contact-socials a:hover {
  color: var(--text);
}

.api-status {
  padding: 0 24px 25px;
  text-align: center;
}

.api-message {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 9px;
  color: #8b96b0;
  font-size: 0.75rem;
  line-height: 1.7;
}

.api-success {
  color: #86dcb5;
}

.api-error {
  max-width: 600px;
  color: #f0b8a8;
}

.footer {
  width: min(1120px, calc(100% - 48px));
  min-height: 105px;
  margin-inline: auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  border-top: 1px solid rgba(146, 155, 179, 0.12);
}

.footer > p {
  color: #77819a;
  font-size: 0.75rem;
  text-align: center;
}

.footer-links {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
}

.footer-links a {
  color: #a8b7ff;
  font-size: 0.75rem;
  transition: color 0.2s ease;
}

.footer-links a:hover {
  color: #ffffff;
}

.footer-links .back-to-top {
  color: #8991a9;
  white-space: nowrap;
}

@media (max-width: 900px) {
  .hero {
    grid-template-columns: 1fr;
    gap: 35px;
    padding-top: 65px;
  }

  .hero-content {
    max-width: 650px;
  }

  .hero-visual {
    width: min(100%, 550px);
    margin-inline: auto;
  }

  .code-content {
    font-size: 0.76rem;
  }

  .badge-vue {
    right: 0;
  }

  .badge-laravel {
    left: 0;
  }

  .about-grid {
    gap: 35px;
  }

  .skills-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .projects-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .footer {
    padding: 25px 0;
    flex-wrap: wrap;
  }
}

@media (max-width: 600px) {
  .section-container,
  .navbar,
  .footer {
    width: calc(100% - 36px);
  }

  .navbar {
    min-height: 72px;
    position: relative;
  }

  .menu-toggle {
    display: block;
  }

  .navbar nav {
    position: absolute;
    z-index: 10;
    top: calc(100% + 1px);
    left: 0;
    right: 0;
    display: none;
    align-items: stretch;
    gap: 0;
    padding: 10px;
    border: 1px solid var(--border);
    border-radius: 0 0 10px 10px;
    background: #0e1220;
  }

  .navbar nav.nav-open {
    display: flex;
    flex-direction: column;
  }

  .navbar nav a {
    padding: 14px 12px;
  }

  .navbar nav .nav-contact {
    margin-top: 5px;
    text-align: center;
  }

  .hero {
    min-height: auto;
    padding-top: 55px;
    padding-bottom: 95px;
    gap: 30px;
  }

  .availability {
    margin-bottom: 25px;
    font-size: 0.59rem;
  }

  .hero h1 {
    font-size: clamp(2.8rem, 12vw, 4rem);
    letter-spacing: -2.5px;
  }

  .hero h2 {
    font-size: 1.05rem;
  }

  .hero-description {
    font-size: 0.88rem;
  }

  .hero-actions {
    align-items: stretch;
  }

  .button {
    padding: 13px 14px;
    font-size: 0.78rem;
  }

  .hero-visual {
    padding: 20px 0;
  }

  .code-content {
    padding: 17px 9px;
    font-size: 0.59rem;
  }

  .line-number {
    width: 23px;
  }

  .code-card-header,
  .code-card-footer {
    padding-inline: 12px;
  }

  .floating-badge {
    padding: 9px 11px;
    font-size: 0.68rem;
  }

  .badge-vue {
    top: 0;
    right: -4px;
  }

  .badge-laravel {
    bottom: 0;
    left: -4px;
  }

  .content-section {
    padding-top: 70px;
    padding-bottom: 35px;
  }

  .section-heading h2,
  .contact-section h2 {
    font-size: 2rem;
  }

  .about-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }

  .about-copy p {
    font-size: 0.88rem;
  }

  .skills-grid {
    gap: 9px;
  }

  .skill-card {
    gap: 8px;
    padding: 15px 10px;
    font-size: 0.74rem;
  }

  .skill-number {
    font-size: 0.59rem;
  }

  .projects-heading {
    align-items: flex-start;
    flex-direction: column;
  }

  .projects-grid {
    grid-template-columns: 1fr;
  }

  .project-art {
    min-height: 120px;
  }

  .project-card > p {
    min-height: auto;
  }

  .contact-section {
    margin-top: 60px;
    margin-bottom: 50px;
    padding: 45px 18px;
  }

  .contact-description {
    font-size: 0.83rem;
  }

  .footer {
    justify-content: center;
    flex-direction: column;
    gap: 13px;
    padding: 25px 0;
  }

  .footer > p {
    margin: 0;
  }

  .footer-links {
    gap: 16px;
  }
}

@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    scroll-behavior: auto !important;
    transition-duration: 0.01ms !important;
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
  }
}
</style>
