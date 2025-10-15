// Minimal JS: nav toggle, year, simple form submit feedback
document.addEventListener('DOMContentLoaded',function(){
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.querySelector('.main-nav');
  if(toggle && nav){
    toggle.addEventListener('click',function(){
      if(nav.style.display === 'block'){nav.style.display='';}
      else{nav.style.display='block'}
    })
  }

  // set year
  var y = new Date().getFullYear();
  var yearEl = document.getElementById('year');
  if(yearEl) yearEl.textContent = y;

  // form UI feedback for AJAX-free environment: show message on submit
  var form = document.getElementById('contactForm');
  var note = document.getElementById('formNote');
  if(form && note){
    form.addEventListener('submit',function(e){
      note.textContent = 'Submitting...';
      // allow normal POST to PHP to handle submission (no AJAX)
    })
  }
});
