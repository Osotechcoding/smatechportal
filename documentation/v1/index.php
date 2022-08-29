<?php
@ob_start();
if (!file_exists("../Includes/initialize.php")){
    die("Access to this Page is Denied! <p>Please Contact Your Administrator for assistance</p>");
}
require_once ("../Includes/initialize.php");
 date_default_timezone_set("Africa/Lagos"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo __OSO_APP_NAME__;?> Documentation Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
<!-- local devlopement -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="newdoc.css">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    
    <div class="col">
      <nav id="navbar">
        <ul class="nav flex-column">
         <header>Smatech User Manual</header>
          <li class="nav-item">
            <a class="nav-link introduction" href="#Introduction">Introduction</a>
          </li>
          <li class="nav-item">
           <a class="nav-link layout" href="#SchoolSettings">School Profile Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link content" href="#Content">Administrative Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link components" href="#Components">Restults Management</a>
          </li>
          <li class="nav-item">
            <a class="nav-link reference" href="#Reference">Student Management</a>
          </li>
           <li class="nav-item">
            <a class="nav-link reference" href="#Reference">Staff Management</a>
          </li>
           <li class="nav-item">
            <a class="nav-link reference" href="#Reference">School Bus Management</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link reference" href="#Reference">Hostel Management</a>
          </li>
           <li class="nav-item">
            <a class="nav-link reference" href="#Reference">Library Management</a>
          </li>

          </li>
           <li class="nav-item">
            <a class="nav-link reference" href="#Reference">Newsletters Management</a>
          </li>
      </ul>
   </nav>
  </div>
      
<div class="col-md-9">
  <main id="main-doc">    
    <div class="head-box">
      <h1>SMATECH VERSION 2.0.5 DOCS</h1>
    </div>
    
      <section class="main-section" id="Introduction">
        <header><h2>Introduction</h2></header>
          <article>
            <p>Originally created by a designer and a developer at Twitter, Bootstrap has become one of the most popular front-end frameworks and open source projects in the world.</p>
            <p>Originally released on Friday, August 19, 2011, we’ve since had over twenty releases, including two major rewrites with v2 and v3. With Bootstrap 2, we added responsive functionality to the entire framework as an optional stylesheet. Building on that with Bootstrap 3, we rewrote the library once more to make it responsive by default with a mobile first approach.</p>
            <p>With Bootstrap 4, we once again rewrote the project to account for two key architectural changes: a migration to Sass and the move to CSS’s flexbox. Our intention is to help in a small way to move the web development community forward by pushing for newer CSS properties, fewer dependencies, and new technologies across more modern browsers.</p>
       </article>
     </section>
  
  <section class="main-section" id="SchoolSettings">
    <header><h2>Settings</h2></header>
      <article>
      <h3>School Profile </h3>
      <p>how to set the school profile using smapp will be explained here (meaning its <code class="highlight-rouge">max-width</code> changes at each breakpoint) or fluid-width (meaning it’s <code class="highlight-rouge">100%</code> wide all the time).</p>
      <p>While containers can be nested, most layouts do not require a nested container.</p>
      
  <pre>
    <code>
    &lt;div class="container">&lt;/div&gt;</code>
  </pre>
 
        <p>Use <code class="highlight-rouge">.container-fluid</code> for a full width container, spanning the entire width of the viewport.</p> 
    
  <pre>
    <code>
    &lt;div class="container-fluid">...&lt;/div&gt;</code>
  </pre>
    
    <h3>Z-index</h3>
        <p>Several Bootstrap components utilize <code class="highlight-rouge">z-index</code>, the CSS property that helps control layout by providing a third axis to arrange content. We utilize a default z-index scale in Bootstrap that’s been designed to properly layer navigation, tooltips and popovers, modals, and more.</p>

    <p>These higher values start at an arbitrary number, high and specific enough to ideally avoid conflicts. We need a standard set of these across our layered components—tooltips, popovers, navbars, dropdowns, modals—so we can be reasonably consistent in the behaviors. There’s no reason we couldn’t have used <code class="highlight-rouge">100+</code> or <code class="highlight-rouge">500+</code>.</p>
    
  <pre>
    <code>
    $zindex-dropdown:          1000 !default;
$zindex-sticky:            1020 !default;
$zindex-fixed:             1030 !default;
$zindex-modal-backdrop:    1040 !default;
$zindex-modal:             1050 !default;
$zindex-popover:           1060 !default
$zindex-tooltip:           1070 !default;</code>
  </pre>
        
    </article>    
  </section>
  
    <section class="main-section" id="Content">
      <header><h2>Content</h2></header>
       <article>
         <h3>Approach</h3>
         <p>Reboot builds upon Normalize, providing many HTML elements with somewhat opinionated styles using only element selectors. Additional styling is done only with classes. For example, we reboot some &lt;table&gt; styles for a simpler baseline and later provide <code class="highlight-rouge">.table</code>, <code class="highlight-rouge">.table-bordered</code>, and more.</p>
         <ul>
           <li>Update some browser default values to use <code class="highlight-rouge">rem</code>s instead of <code class="highlight-rouge">em</code>s for scalable component spacing.</li>
           <li>Avoid <code class="highlight-rouge">margin-top</code>. Vertical margins can collapse, yielding unexpected results. More importantly though, a single direction of <code class="highlight-rouge">margin</code> is a simpler mental model.</li>
           <li>For easier scaling across device sizes, block elements should use <code class="highlight-rouge">rem</code>s for <code class="highlight-rouge">margin</code>s.</li>
         </ul>
         
        <h3>Page defaults</h3>
         <p>The <code class="highlight-rouge">&lt;html&gt;</code> and <code class="highlight-rouge">&lt;body&gt;</code> elements are updated to provide better page-wide defaults. More specifically:</p>
        <ul>
          <li>The <code class="highlight-rouge">box-sizing</code> is globally set on every element—including <code class="highlight-rouge">*::before</code> and <code class="highlight-rouge">*::after</code>, to <code class="highlight-rouge">border-box</code>. This ensures that the declared width of element is never exceeded due to padding or border.</li>
          <li>The <code class="highlight-rouge">&lt;body&gt;</code> also sets a global <code class="highlight-rouge">font-family</code>, <code class="highlight-rouge">line-height</code>, and <code class="highlight-rouge">text-align</code>. This is inherited later by some form elements to prevent font inconsistencies.</li>
          <li>For safety, the <code class="highlight-rouge">&lt;body&gt;</code> has a declared <code class="highlight-rouge">background-color</code>, defaulting to <code class="highlight-rouge">#fff</code>.
        </li>
      </ul>
        
    <h3>Preformatted text</h3>    
         <p>The <code class="highlight-rouge">&lt;pre&gt;</code> element is reset to remove its <code class="highlight-rouge">margin-top</code> and use <code class="highlight-rouge">rem</code> units for its <code class="highlight-rouge">margin-bottom</code>.</p>
          
  <pre>
    <code>
    .example-element {
margin-bottom: 1rem;
}</code>
  </pre>
   </article> 
  </section>
          
  <section class="main-section" id="Components">
        <header><h2>Components</h2></header>
          <article>
            <h3>Alerts</h3>
            <p>Alerts are available for any length of text, as well as an optional dismiss button. For proper styling, use one of the eight required contextual classes (e.g., <code class="highlight-rouge">.alert-success</code>). For inline dismissal, use the alerts jQuery plugin.</p>
  <pre>
    <code>
    class="bl">&lt;div&gt; class="alert alert-primary" role="alert">
This is a primary alert—check it out!&lt;/div&gt;
&lt;div&gt; class="alert alert-secondary" role="alert">
This is a secondary alert—check it out!
&lt;/div&gt;
&lt;div&gt; class="alert alert-success" role="alert">
This is a success alert—check it out!
&lt;/div&gt;
&lt;div&gt; class="alert alert-danger role="alert">
This is a danger alert—check it out!
&lt;/div&gt;
&lt;div&gt; class="alert alert-warning" role="alert">
This is a warning alert—check it out!
&lt;/div&gt;
&lt;div&gt; class="alert alert-info" role="alert">
This is a info alert—check it out!
&lt;/div&gt;
&lt;div&gt; class="alert alert-light" role="alert">
This is a light alert—check it out!
&lt;/div&gt;
&lt;div&gt; class="alert alert-dark" role="alert">
This is a dark alert—check it out!
&lt;/div&gt;</code>
  </pre>

    <h3>Badges</h3>
    <p>Badges scale to match the size of the immediate parent element by using relative font sizing and <code class="highlight-rouge">em</code> units.</p>
    
  <pre>
    <code>
    &lt;h1&gt;Example heading &lt;span class="badge badge-secondary">
New&lt;/span&gt;&lt;/h1&gt;
&lt;h2&gt;Example heading &lt;span class="badge badge-secondary">
New&lt;/span&gt;&lt;/h2&gt;
&lt;h3&gt;Example heading &lt;span&gt;&lt; class="badge badge-secondary">
New&lt;/span&gt;&lt;/h3&gt;
&lt;h4&gt;Example heading &lt;span&gt;&lt; class="badge badge-secondary">
New&lt;/span&gt;&lt;/h4&gt;
&lt;h5&gt;Example heading &lt;span&gt;&lt; class="badge badge-secondary">
New&lt;/span&gt;&lt;/h5&gt;
&lt;h6&gt;Example heading &lt;span&gt;&lt; class="badge badge-secondary">
New&lt;/span&gt;&lt;/h6&gt;</code>
  </pre>
    
    </article>
</section>          
    
    <section class="main-section" id="Reference">
        <header><h2>Reference</h2></header>
          <article>
            <p>All the documentation in this page was taken from <a href="https://getbootstrap.com/docs/4.0/getting-started/introduction/" target="_blank">Get Bootstrap</a>.</p>
          </article>
    </section>
    </main>
      
    <hr>
 <footer>
      <div class="contact">
    <a href="https://github.com/linh4" target="_blank">
      <span class="icon"><i class="fa fa-github"></i></span></a>
    <a href="https://codepen.io/linh4/" target="_blank">
      <span class="icon"><i class="fa fa-codepen"></i></span></a>
    <a href="https://www.freecodecamp.org/linh4" target="_blank">
      <span class="icon"><i class="fa fa-free-code-camp"></i></span></a>
  </div>
      <p>&copy 2018 Linh Huynh</p>
    </footer>    
    
  </div>
 </div>
</div>
    
</body>
</html>