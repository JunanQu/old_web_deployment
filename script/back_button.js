$(window).load(function(){
  $('body').backDetect(function(){
    alert("Please Do Not Go Back!");
    window.history.pushState('forward', null, './#forward');
  });
});
