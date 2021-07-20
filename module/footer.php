<footer>
    <span id="footer_links"><a href="">Privacy</a>|<a href="">Terms</a>|<a href="">Careers</a>|<a href="">Support</a></span>
    <div id="copyright_text"><span>&#169;</span> Incognittus.com 2020</div>
</footer>
<script>
$(document).ready( function() {
  $(window).scroll( switchNav );
});

function switchNav(){
  if( $(window).scrollTop() > 50 && $("header").hasClass("scrolled") == false ){
    $("header").addClass("scrolled");
  } else if( $(window).scrollTop() <= 50 && $("header").hasClass("scrolled") ) {
    $("header").removeClass("scrolled");
  } else {
    return;
  }
}
</script>
</body>
</html>
