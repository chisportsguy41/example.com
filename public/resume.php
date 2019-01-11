<?php
require '../core/functions.php';

$meta = [];
$meta['title'] = 'About Caleb';
$meta['description'] = 'Caleb\'s resume';

$content = <<<EOT
    <h1>CALEB NORDGREN</h1>
    <div class="links">
      <a href="linkedin.com/in/chisportsguy41" target="_blank" rel="noopener">LinkedIn</a>
      &#x25CF;
      <a href="github.com/chisportsguy41" target="_blank" rel="noopener">GitHub</a>
      &#x25CF;
      Chicago, IL
    </div>
    <section>
      <h2>Full Stack Web and Hybrid Mobile Applications Developer</h2>
      <p>Full stack web and hybrid mobile applications developer specializing in full stack JavaScript application and
        architectures. Experienced in all stages of the development life cycle, well versed in numerous programming
        languages.</p>
      <ul>
        <li>Hands-on experience leading all stages of system development efforts, including requirements in definition
          design, architecture, testing, and support.</li>
        <li>Outstanding leadership abilities; able to coordinate and direct all phases of project-based efforts.</li>
      </ul>
      <h3 class="core">Core Competencies</h3>
      <div class="competencies"></div>
      <div class="competencies">
        <ul>
          <li class="comps">Full Stack Development</li>
          <li class="comps">Strong Analytical Skills</li>
          <li class="comps">Prioritizes tasks</li>
        </ul>
      </div>
      <div class="competencies">
        <ul>
          <li class="comps">Hybrid Mobile Development</li>
          <li class="comps">Savvy Problem Solver</li>
          <li class="comps">Strong Leadership Skills</li>
        </ul>
      </div>
      <div class="competencies"></div>
    </section>
    <h2>CERTIFICATIONS/TECHNICAL PROFICIENCIES</h2>
    <table style="width:60%">
      <tr>
        <th><span class="cert">Certifications:</span></th>
        <th>Agile Certified Scrum Master</th>
      </tr>
      <tr>
        <th><span class="cert">Platforms:</span></th>
        <th>Linux, Windows, Mac, LAMP, MEAN, NodeJS</th>
      </tr>
      <tr>
        <th><span class="cert">Database:</span></th>
        <th>MySQL, MongoDB</th>
      </tr>
      <tr>
        <th><span class="cert">Tools:</span></th>
        <th>VS Code, SSH, Gulp, Git</th>
      </tr>
      <tr>
        <th><span class="cert">Languages:</span></th>
        <th>HTML, CSS, SASS, JavaScript, ES6, PHP, Bash, SQL</th>
      </tr>
    </table>
    <section>
      <h2>PROFESSSIONAL EXPERIENCE</h2>
      <h3 class="clearfix">
        <span class="float-left">Bob's Custom Websites -- Chicago, IL</span>
        <span class="float-right">2015-present</span></h3>
      <p>Bob's Custom Websites builds custom web applications for clients across a large number of industries.</p>
      <h4>Web Developer</h4>
      <ul>
        <li>Work with ES6, NodeJS, HTML, JavaScript, CSS, MySQL, and MongoDB to build customized web applications for a
          diverse set of customers.</li>
        <li>Designed the application to meet the users' requirements document.</li>
        <li>Ensured corporate and department objectives were accomplished in accordance with outlined objectives and
          mission statements.</li>
      </ul>
      <p><span class="cert">Key Contributions:</span></p>
      <ul>
        <li>Developed and implemented procedures and guidelines, optimizing productivity and efficiency; generating
          significant cost savings.</li>
        <li>Recognized for the development of excellent business relationships, providing exemplary customer service.</li>
      </ul>
    </section>
    <section>
      <h2>EDUCATION</h2>
      <p class="clearfix">
        <span class="float-left">Michigan State University -- East Lansing, MI</span>
        <span class="float-right">2011-2014</span></p>
      <p></p>
      <p class="clearfix">
        <span class="float-left">MicroTrain Technologies -- Chicago, IL</span>
        <span class="float-right">2018-2019</span></p>
    </section>
EOT;

require '../core/layout.php';
