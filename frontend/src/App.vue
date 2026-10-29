
<script setup>
import { ref, onMounted } from 'vue'

const portfolio = ref({
  name: 'Zain Sanwar Ahmed',
  title: 'Aspiring Full-Stack Developer',
  location: 'Dhaka, Bangladesh',
  skills: [
    'HTML & CSS',
    'JavaScript',
    'Vue.js',
    'PHP',
    'Laravel',
    'MySQL',
    'Git & GitHub',
    'REST APIs',
  ],
  message: 'Welcome to my portfolio!',
})

const loading = ref(true)
const apiError = ref(false)

const projects = [
  {
    number: '01',
    title: 'Personal Portfolio Website',
    description:
      'A responsive personal portfolio built with Vue 3 and Laravel to showcase my skills, projects, and development journey.',
    technologies: ['Vue 3', 'Laravel', 'REST API', 'CSS'],
    status: 'In progress',
    github: 'https://github.com/Zain-Sanwar-Ahmed/zain-portfolio',
  },
  {
    number: '02',
    title: 'Laravel Web Application',
    description:
      'A planned web application to practise backend development, routing, database integration, and API development with Laravel.',
    technologies: ['PHP', 'Laravel', 'MySQL'],
    status: 'Planned',
    github: 'https://github.com/Zain-Sanwar-Ahmed',
  },
  {
    number: '03',
    title: 'Vue.js Frontend Project',
    description:
      'A planned frontend project focused on reusable Vue components, responsive layouts, and connecting applications to APIs.',
    technologies: ['Vue 3', 'JavaScript', 'REST APIs'],
    status: 'Planned',
    github: 'https://github.com/Zain-Sanwar-Ahmed',
  },
]

onMounted(async () => {
  try {
    const response = await fetch(
      'https://zain-portfolio-api.onrender.com/api/portfolio'
    )

    if (!response.ok) {
      throw new Error('Unable to load portfolio data')
    }

    const data = await response.json()
    portfolio.value = { ...portfolio.value, ...data }
  } catch (error) {
    console.error('Portfolio API error:', error)
    apiError.value = true
  } finally {
    loading.value = false
  }
})

const currentYear = new Date().getFullYear()
</script>

<template>
  <div class="site-wrapper">
    <header class="navbar">
      <a class="logo" href="#home">Z<span>.</span></a>

      <nav class="nav-links" aria-label="Main navigation">
        <a href="#about">About</a>
        <a href="#skills">Skills</a>
        <a href="#projects">Projects</a>
        <a href="#contact">Contact</a>
      </nav>

      <a
        class="nav-button"
        href="https://github.com/Zain-Sanwar-Ahmed"
        target="_blank"
        rel="noopener noreferrer"
      >
        GitHub <span aria-hidden="true">↗</span>
      </a>
    </header>

    <main>
      <section id="home" class="hero section-container">
        <div class="hero-content">
          <div class="availability">
            <span class="status-dot"></span>
            Aspiring Developer · {{ portfolio.location }}
          </div>

          <p class="eyebrow">HELLO, WORLD! I'M</p>

          <h1>
            {{ portfolio.name.split(' ').slice(0, 2).join(' ') }}
            <span class="highlight">
              {{ portfolio.name.split(' ').slice(2).join(' ') }}
            </span>
          </h1>

          <h2>{{ portfolio.title }}</h2>

          <p class="hero-description">
            I'm learning to build useful, responsive, and user-friendly web
            applications. I enjoy exploring frontend and backend technologies
            and turning ideas into working projects.
          </p>

          <div class="hero-actions">
            <a class="button button-primary" href="#projects">
              Explore my work <span aria-hidden="true">↓</span>
            </a>

            <a class="button button-secondary" href="#contact">
              Get in touch
            </a>
          </div>

          <p v-if="loading" class="api-message">
            Connecting to portfolio API…
          </p>

          <p v-else-if="apiError" class="api-message">
            Showing portfolio information saved in the frontend.
          </p>

          <p v-else class="api-message success-message">
            <span class="status-dot"></span>
            Portfolio API connected
          </p>
        </div>

        <div class="hero-card">
          <div class="code-window">
            <div class="window-header">
              <div class="window-dots">
                <span></span><span></span><span></span>
              </div>
              <span class="window-title">developer.js</span>
            </div>

            <div class="code-content">
              <p><span class="code-purple">const</span> developer = {</p>
              <p class="indent">
                name:
                <span class="code-green">'{{ portfolio.name }}'</span>,
              </p>
              <p class="indent">
                role:
                <span class="code-green">'Full-Stack Developer'</span>,
              </p>
              <p class="indent">
                location:
                <span class="code-green">'Dhaka, Bangladesh'</span>,
              </p>
              <p class="indent">
                learning: [
              </p>
              <p class="indent code-green">
                'Vue.js', 'Laravel'
              </p>
              <p class="indent">],</p>
              <p class="indent">
                openToWork: <span class="code-orange">true</span>,
              </p>
              <p>}</p>
              <p class="code-comment">
                // Always learning, always building.
              </p>
              <p class="code-cursor">▋</p>
            </div>
          </div>

          <div class="floating-badge badge-top">
            <span class="badge-icon">⌘</span>
            <div>
              <strong>Frontend</strong>
              <small>Vue.js · JavaScript</small>
            </div>
          </div>

          <div class="floating-badge badge-bottom">
            <span class="badge-icon badge-icon-green">⌁</span>
            <div>
              <strong>Backend</strong>
              <small>PHP · Laravel</small>
            </div>
          </div>
        </div>
      </section>

      <section id="about" class="section-container section-block">
        <div class="section-heading">
          <p class="eyebrow">A LITTLE ABOUT ME</p>
          <h2>Learning today. <span class="highlight">Building for tomorrow.</span></h2>
        </div>

        <div class="about-grid">
          <div class="about-copy">
            <p>
              I'm an aspiring full-stack developer based in Dhaka, Bangladesh,
              working toward building a career in software development.
            </p>
            <p>
              My learning journey includes frontend technologies such as HTML,
              CSS, JavaScript, and Vue.js, alongside backend development with
              PHP and Laravel.
            </p>
            <p>
              I'm focused on strengthening my fundamentals, building practical
              projects, learning to work with APIs, and improving my
              problem-solving skills.
            </p>
          </div>

          <div class="about-facts">
            <div class="fact-card">
              <span class="fact-number">01</span>
              <div>
                <h3>Keep learning</h3>
                <p>Continuously developing my technical skills.</p>
              </div>
            </div>

            <div class="fact-card">
              <span class="fact-number">02</span>
              <div>
                <h3>Build projects</h3>
                <p>Applying concepts through hands-on practice.</p>
              </div>
            </div>

            <div class="fact-card">
              <span class="fact-number">03</span>
              <div>
                <h3>Grow as a developer</h3>
                <p>Working toward professional software development.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="skills" class="section-container section-block">
        <div class="section-heading">
          <p class="eyebrow">MY TOOLKIT</p>
          <h2>Skills & <span class="highlight">Technologies</span></h2>
          <p class="section-description">
            Technologies I'm learning and using in my development journey.
          </p>
        </div>

        <div class="skills-grid">
          <div
            v-for="(skill, index) in portfolio.skills"
            :key="skill"
            class="skill-card"
          >
            <span class="skill-index">
              {{ String(index + 1).padStart(2, '0') }}
            </span>
            <span class="skill-name">{{ skill }}</span>
            <span class="skill-arrow" aria-hidden="true">↗</span>
          </div>
        </div>
      </section>

      <section id="projects" class="section-container section-block">
        <div class="section-heading project-heading">
          <div>
            <p class="eyebrow">SELECTED WORK</p>
            <h2>Projects & <span class="highlight">Practice</span></h2>
          </div>

          <a
            class="text-link"
            href="https://github.com/Zain-Sanwar-Ahmed"
            target="_blank"
            rel="noopener noreferrer"
          >
            View GitHub profile <span aria-hidden="true">↗</span>
          </a>
        </div>

        <div class="projects-grid">
          <article
            v-for="project in projects"
            :key="project.number"
            class="project-card"
          >
            <div class="project-card-top">
              <span class="project-number">{{ project.number }}</span>
              <span class="project-status">{{ project.status }}</span>
            </div>

            <div class="project-illustration">
              <span class="illustration-symbol">
                {{ project.number === '01' ? '</>' : project.number === '02' ? '{ }' : '⌘' }}
              </span>
              <span class="illustration-line"></span>
              <span class="illustration-line short-line"></span>
            </div>

            <h3>{{ project.title }}</h3>
            <p class="project-description">{{ project.description }}</p>

            <div class="technology-list">
              <span
                v-for="technology in project.technologies"
                :key="technology"
                class="technology-tag"
              >
                {{ technology }}
              </span>
            </div>

            <a
              class="project-link"
              :href="project.github"
              target="_blank"
              rel="noopener noreferrer"
            >
              View on GitHub <span aria-hidden="true">↗</span>
            </a>
          </article>
        </div>

        <p class="projects-note">
          Note: Projects marked Planned or In progress are not presented as
          completed work.
        </p>
      </section>

      <section id="contact" class="section-container section-block">
        <div class="contact-panel">
          <div class="contact-content">
            <p class="eyebrow">LET'S CONNECT</p>
            <h2>Have an opportunity or <span class="highlight">a project in mind?</span></h2>
            <p>
              I'm interested in connecting with developers, learning from
              experienced professionals, and exploring suitable entry-level
              opportunities in software development.
            </p>

            <a
              class="button button-primary"
              href="mailto:zainsanwarahmed@gmail.com"
            >
              Email me <span aria-hidden="true">↗</span>
            </a>
          </div>

          <div class="contact-links">
            <a
              href="https://github.com/Zain-Sanwar-Ahmed"
              target="_blank"
              rel="noopener noreferrer"
              class="social-link"
            >
              <span class="social-symbol">GH</span>
              <span>
                <strong>GitHub</strong>
                <small>Explore my repositories</small>
              </span>
              <span class="social-arrow">↗</span>
            </a>

            <a
              href="https://www.linkedin.com/in/zain-sanwar-ahmed-6562291ab/"
              target="_blank"
              rel="noopener noreferrer"
              class="social-link"
            >
              <span class="social-symbol">in</span>
              <span>
                <strong>LinkedIn</strong>
                <small>Connect professionally</small>
              </span>
              <span class="social-arrow">↗</span>
            </a>

            <a
              href="mailto:zainsanwarahmed@gmail.com"
              class="social-link"
            >
              <span class="social-symbol">@</span>
              <span>
                <strong>Email</strong>
                <small>zainsanwarahmed@gmail.com</small>
              </span>
              <span class="social-arrow">↗</span>
            </a>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <a class="logo footer-logo" href="#home">Z<span>.</span></a>

      <p>
        © {{ currentYear }} {{ portfolio.name }}. Built with Vue.js.
      </p>

      <a href="#home" class="back-to-top">
        Back to top ↑
      </a>
    </footer>
  </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700;800&display=swap');

:root {
  font-family: 'Inter', sans-serif;
  color: #e8edf8;
  background: #080d19;
  font-synthesis: none;
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  font-optical-sizing: auto;
  scroll-behavior: smooth;
  --background: #080d19;
  --surface: #0d1424;
  --surface-light: #111b2e;
  --border: #202d43;
  --text: #e8edf8;
  --muted: #9ba8bd;
  --accent: #7c9cff;
  --green: #7ee7bd;
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  min-width: 320px;
  background:
    radial-gradient(ellipse at 50% -15%, #172748 0%, transparent 45%),
    var(--background);
}

a {
  color: inherit;
  text-decoration: none;
}

button,
a {
  -webkit-tap-highlight-color: transparent;
}

button:focus-visible,
a:focus-visible {
  outline: 2px solid var(--accent);
  outline-offset: 4px;
}

.site-wrapper {
  overflow: hidden;
}

.section-container,
.navbar,
.footer {
  width: min(1120px, calc(100% - 48px));
  margin-inline: auto;
}

.navbar {
  min-height: 82px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid rgba(155, 168, 189, 0.12);
}

.logo {
  font-size: 30px;
  font-weight: 800;
  letter-spacing: -2px;
}

.logo span {
  color: var(--accent);
}

.nav-links {
  display: flex;
  gap: 32px;
}

.nav-links a,
.nav-button,
.text-link {
  font-size: 13px;
  font-weight: 500;
}

.nav-links a {
  color: var(--muted);
  transition: color 0.2s;
}

.nav-links a:hover,
.text-link:hover {
  color: var(--accent);
}

.nav-button {
  padding: 11px 15px;
  border: 1px solid var(--border);
  border-radius: 8px;
  transition: background 0.2s, border-color 0.2s;
}

.nav-button:hover {
  background: var(--surface-light);
  border-color: var(--accent);
}

.nav-button span,
.text-link span {
  margin-left: 5px;
}

.hero {
  min-height: 620px;
  padding-block: 105px 100px;
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  align-items: center;
  gap: 60px;
}

.availability {
  display: inline-flex;
  align-items: center;
  gap: 9px;
  border: 1px solid var(--border);
  background: rgba(17, 27, 46, 0.8);
  padding: 9px 13px;
  border-radius: 100px;
  color: #c0cbdf;
  font-size: 11px;
  margin-bottom: 35px;
}

.status-dot {
  display: inline-block;
  width: 7px;
  height: 7px;
  flex-shrink: 0;
  border-radius: 50%;
  background: var(--green);
  box-shadow: 0 0 12px rgba(126, 231, 189, 0.5);
}

.eyebrow {
  color: var(--accent);
  font-family: 'DM Mono', monospace;
  font-size: 11px;
  letter-spacing: 2px;
  margin: 0 0 17px;
}

.hero h1 {
  font-size: clamp(42px, 5vw, 66px);
  line-height: 1.12;
  letter-spacing: -3px;
  margin: 0;
  font-weight: 800;
}

.highlight {
  color: var(--accent);
}

.hero h2 {
  font-size: clamp(19px, 2vw, 24px);
  font-weight: 500;
  color: #c1ccdf;
  margin: 20px 0 0;
}

.hero-description {
  max-width: 510px;
  color: var(--muted);
  font-size: 14px;
  line-height: 1.9;
  margin: 23px 0 28px;
}

.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
}

.button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  border-radius: 8px;
  padding: 14px 19px;
  font-size: 12px;
  font-weight: 700;
  transition: transform 0.2s, background 0.2s, border-color 0.2s;
}

.button:hover {
  transform: translateY(-2px);
}

.button-primary {
  color: #081020;
  background: var(--accent);
}

.button-primary:hover {
  background: #9ab2ff;
}

.button-secondary {
  border: 1px solid var(--border);
  color: var(--text);
  background: transparent;
}

.button-secondary:hover {
  background: var(--surface-light);
}

.api-message {
  color: #8290a8;
  font-size: 11px;
  margin-top: 20px;
}

.success-message {
  display: flex;
  align-items: center;
  gap: 8px;
  color: var(--green);
}

.hero-card {
  min-width: 0;
  position: relative;
  padding: 25px;
}

.code-window {
  border: 1px solid #28364f;
  background: #0c1322;
  border-radius: 13px;
  box-shadow: 0 30px 100px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  transform: rotate(1deg);
}

.window-header {
  display: flex;
  align-items: center;
  gap: 18px;
  padding: 16px 18px;
  border-bottom: 1px solid #202c40;
}

.window-dots {
  display: flex;
  gap: 6px;
}

.window-dots span {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: #52627a;
}

.window-dots span:first-child {
  background: #ff7c87;
}

.window-dots span:nth-child(2) {
  background: #f6c76d;
}

.window-dots span:nth-child(3) {
  background: #72d8a8;
}

.window-title {
  color: #8796ad;
  font-family: 'DM Mono', monospace;
  font-size: 11px;
}

.code-content {
  padding: 27px 23px 31px;
  color: #cbd5e5;
  font-family: 'DM Mono', monospace;
  font-size: clamp(10px, 1.15vw, 13px);
  line-height: 2.2;
  white-space: nowrap;
}

.code-content p {
  margin: 0;
}

.indent {
  padding-left: 22px;
}

.code-purple {
  color: #c8a5ff;
}

.code-green {
  color: #82e6bd;
}

.code-orange {
  color: #ffc17c;
}

.code-comment {
  color: #71819a;
  margin-top: 13px !important;
}

.code-cursor {
  color: var(--accent);
  animation: blink 1s steps(2, start) infinite;
}

@keyframes blink {
  to {
    visibility: hidden;
  }
}

.floating-badge {
  position: absolute;
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 14px 17px;
  background: #131e31;
  border: 1px solid #2b3b56;
  border-radius: 10px;
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
}

.badge-top {
  top: 0;
  right: -8px;
}

.badge-bottom {
  bottom: 0;
  left: -12px;
}

.badge-icon {
  display: grid;
  place-items: center;
  width: 35px;
  height: 35px;
  border-radius: 8px;
  background: #27385c;
  color: #b8c8ff;
  font-size: 20px;
}

.badge-icon-green {
  color: var(--green);
  background: #18372f;
}

.floating-badge strong,
.floating-badge small {
  display: block;
}

.floating-badge strong {
  font-size: 11px;
  margin-bottom: 5px;
}

.floating-badge small {
  font-size: 9px;
  color: var(--muted);
}

.section-block {
  padding-block: 92px;
  border-top: 1px solid rgba(155, 168, 189, 0.12);
}

.section-heading {
  margin-bottom: 38px;
}

.section-heading h2,
.contact-content h2 {
  font-size: clamp(27px, 3.5vw, 39px);
  line-height: 1.3;
  letter-spacing: -1.5px;
  margin: 0;
}

.section-description {
  color: var(--muted);
  font-size: 13px;
  line-height: 1.8;
  margin-top: 15px;
}

.about-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 65px;
  align-items: start;
}

.about-copy p {
  color: var(--muted);
  font-size: 13px;
  line-height: 2;
  margin: 0 0 18px;
}

.about-facts {
  display: grid;
  gap: 12px;
}

.fact-card {
  display: flex;
  align-items: flex-start;
  gap: 18px;
  padding: 19px;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 10px;
}

.fact-number {
  font-family: 'DM Mono', monospace;
  font-size: 12px;
  color: var(--accent);
  padding-top: 2px;
}

.fact-card h3 {
  font-size: 13px;
  margin: 0 0 7px;
}

.fact-card p {
  color: var(--muted);
  font-size: 11px;
  line-height: 1.7;
  margin: 0;
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
  min-height: 75px;
  padding: 17px;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 9px;
  transition: border-color 0.2s, transform 0.2s;
}

.skill-card:hover {
  border-color: #526ba5;
  transform: translateY(-3px);
}

.skill-index {
  font-family: 'DM Mono', monospace;
  font-size: 10px;
  color: #71819a;
}

.skill-name {
  font-size: 12px;
  font-weight: 600;
}

.skill-arrow {
  margin-left: auto;
  color: #687995;
  font-size: 12px;
}

.project-heading {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 20px;
}

.text-link {
  color: #c0cce1;
  white-space: nowrap;
  padding-bottom: 5px;
}

.projects-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 17px;
}

.project-card {
  display: flex;
  flex-direction: column;
  min-width: 0;
  padding: 22px;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 12px;
  transition: transform 0.2s, border-color 0.2s;
}

.project-card:hover {
  transform: translateY(-4px);
  border-color: #526ba5;
}

.project-card-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 8px;
}

.project-number {
  color: var(--accent);
  font-family: 'DM Mono', monospace;
  font-size: 12px;
}

.project-status {
  border: 1px solid #35435b;
  border-radius: 100px;
  padding: 5px 8px;
  color: #b4c1d5;
  font-size: 9px;
}

.project-illustration {
  height: 135px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  gap: 12px;
  padding: 22px;
  margin-block: 20px;
  border-radius: 8px;
  background:
    radial-gradient(ellipse at 80% 20%, rgba(124, 156, 255, 0.16), transparent 55%),
    #111c30;
  border: 1px solid #202f48;
}

.illustration-symbol {
  color: #a6baff;
  font-family: 'DM Mono', monospace;
  font-size: 30px;
  font-weight: 500;
}

.illustration-line {
  display: block;
  width: 75%;
  height: 5px;
  border-radius: 10px;
  background: #2c3b55;
}

.short-line {
  width: 47%;
  background: #26344c;
}

.project-card h3 {
  font-size: 16px;
  line-height: 1.5;
  margin: 0 0 11px;
}

.project-description {
  color: var(--muted);
  font-size: 11px;
  line-height: 1.9;
  margin: 0 0 19px;
}

.technology-list {
  display: flex;
  flex-wrap: wrap;
  gap: 7px;
  margin-bottom: 22px;
}

.technology-tag {
  padding: 6px 8px;
  color: #bdc9dc;
  background: #152137;
  border-radius: 5px;
  font-size: 9px;
}

.project-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  margin-top: auto;
  padding-top: 15px;
  border-top: 1px solid var(--border);
  color: #c6d3ff;
  font-size: 11px;
  font-weight: 600;
}

.project-link:hover {
  color: var(--green);
}

.projects-note {
  color: #8290a8;
  font-size: 11px;
  line-height: 1.8;
  margin-top: 20px;
}

.contact-panel {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: 55px;
  padding: 48px;
  background:
    radial-gradient(ellipse at 0% 0%, rgba(124, 156, 255, 0.1), transparent 55%),
    var(--surface);
  border: 1px solid var(--border);
  border-radius: 15px;
}

.contact-content h2 {
  max-width: 480px;
}

.contact-content > p:not(.eyebrow) {
  color: var(--muted);
  font-size: 12px;
  line-height: 1.9;
  margin: 19px 0 25px;
}

.contact-links {
  display: grid;
  align-content: center;
  gap: 12px;
}

.social-link {
  display: flex;
  align-items: center;
  gap: 13px;
  padding: 15px;
  border: 1px solid var(--border);
  border-radius: 9px;
  transition: background 0.2s, border-color 0.2s;
}

.social-link:hover {
  background: #142037;
  border-color: #526ba5;
}

.social-symbol {
  display: grid;
  place-items: center;
  width: 36px;
  height: 36px;
  flex-shrink: 0;
  border-radius: 8px;
  background: #202f4b;
  color: #b7c8ff;
  font-family: 'DM Mono', monospace;
  font-size: 12px;
}

.social-link strong,
.social-link small {
  display: block;
}

.social-link strong {
  font-size: 11px;
  margin-bottom: 5px;
}

.social-link small {
  color: var(--muted);
  font-size: 10px;
  overflow-wrap: anywhere;
}

.social-arrow {
  margin-left: auto;
  color: #8b9cb7;
}

.footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  padding-block: 28px;
  border-top: 1px solid rgba(155, 168, 189, 0.12);
}

.footer-logo {
  font-size: 24px;
}

.footer p,
.back-to-top {
  color: var(--muted);
  font-size: 10px;
  line-height: 1.7;
}

.back-to-top:hover {
  color: var(--accent);
}

@media (max-width: 900px) {
  .hero {
    grid-template-columns: 1fr;
    gap: 65px;
    padding-block: 80px;
  }

  .hero-content {
    max-width: 650px;
  }

  .hero-card {
    width: min(550px, 100%);
    margin-inline: auto;
  }

  .skills-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .projects-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .contact-panel {
    grid-template-columns: 1fr;
    gap: 35px;
    padding: 35px;
  }
}

@media (max-width: 600px) {
  .section-container,
  .navbar,
  .footer {
    width: min(100% - 34px, 1120px);
  }

  .navbar {
    min-height: 70px;
  }

  .nav-links {
    gap: 14px;
  }

  .nav-links a {
    font-size: 10px;
  }

  .nav-button {
    display: none;
  }

  .hero {
    min-height: auto;
    padding-block: 70px 75px;
    gap: 48px;
  }

  .availability {
    margin-bottom: 27px;
    font-size: 10px;
  }

  .hero h1 {
    font-size: clamp(39px, 11vw, 55px);
    letter-spacing: -2px;
  }

  .hero-description {
    font-size: 13px;
  }

  .hero-card {
    padding: 13px;
  }

  .code-content {
    padding: 22px 14px;
    font-size: 10px;
  }

  .floating-badge {
    padding: 10px;
  }

  .badge-top {
    right: -5px;
  }

  .badge-bottom {
    left: -5px;
  }

  .section-block {
    padding-block: 65px;
  }

  .about-grid {
    grid-template-columns: 1fr;
    gap: 25px;
  }

  .skills-grid {
    gap: 9px;
  }

  .skill-card {
    gap: 8px;
    padding: 13px 10px;
    min-height: 65px;
  }

  .skill-name {
    font-size: 10px;
  }

  .skill-index {
    font-size: 9px;
  }

  .project-heading {
    align-items: flex-start;
    flex-direction: column;
  }

  .projects-grid {
    grid-template-columns: 1fr;
  }

  .project-illustration {
    height: 120px;
  }

  .contact-panel {
    padding: 24px 18px;
  }

  .footer {
    flex-wrap: wrap;
    gap: 12px;
  }

  .footer p {
    order: 3;
    width: 100%;
    margin: 0;
  }
}

@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    scroll-behavior: auto !important;
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
</style>
