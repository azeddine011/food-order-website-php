$(function(){

  if(sessionStorage.getItem("a") == null){
    sessionStorage.setItem("a","dashboard.php");
    setClass();
  }else{
    var hrefTrimed = sessionStorage.getItem("a").replace(/\.\.\//g,"").trim();
    sessionStorage.setItem("a",hrefTrimed);
    setClass();
  }


  function setClass(){
    $(`.left-border a[href="${sessionStorage.getItem('a')}"]`).parent().addClass("left-border-activated");
  }

  $(".left-border").click(function(){
    let a = $(this).children().closest("a").attr('href');
    sessionStorage.setItem("a",a);
  });

  //redirect on <li> click
  $(".menu-container ul li").click(function(){
    window.location.href = sessionStorage.getItem("a");
  });
    


  // humberger Menu toogle
  $( ".hamburger--emphatic-r" ).click(function() {
    if($(this).hasClass('is-active')) {
      $( this ).removeClass( "is-active" );
    } else {
      $( this ).addClass( "is-active" );
    }
    $(".menu-container").toggleClass("menu-is-active");
  });

  //Logout Menu Toggle
  $(".avatar").click(function(){
    $('.logout-menu').toggleClass("logout-active");
  });
  //table action toggle
  $(".dropDown-btn").click(function(){
    var selectedUl = $(this).next().children();
    $(selectedUl).toggleClass("action-active");
  });
  //clossing menus
  $(document).mouseup(function(){
    if($(".logout-menu").hasClass("logout-active")){
      $(".logout-menu").removeClass("logout-active");
    }
    if($(".dropDown-btn").next().children().hasClass("action-active")){
      $(".dropDown-btn").next().children().removeClass("action-active");
    }
  });

  //save button submit on click
  $("#saveSubmit").click(function(e){
    document.getElementById("myForm").submit();
  });
  //Alert
  // $("#showAlert").click(function(e){
  //   // $(".alertBox").toggleClass("alert-active");
  //   $(".alertBox").addClass("alert-active");
  //   setTimeout(function(){$(".alertBox").removeClass("alert-active");},5000);
  // });
function showAlert(){
    $(".alertBox").addClass("alert-active");
    setTimeout(function(){$(".alertBox").removeClass("alert-active");},5000);
  }

  if($(".alertBox").length){
    showAlert();
  }




});
