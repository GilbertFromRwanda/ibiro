
  $(document).ready(function(){
    $("#getname").on('click',function(event){
      var Oname=$(event.target).text();
    window.location="/Gushakisha/"+Oname.trim();
    });

})
  var reply_click = function()
{
var txt=document.getElementById('input-search').value;
window.location="/Gushakisha/"+txt
}
document.getElementById('search').onclick = reply_click;

