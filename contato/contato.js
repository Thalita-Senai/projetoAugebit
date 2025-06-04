document.querySelector('textarea').addEventListener("pergunta", function(){
  this.style.height = '0px';
  this.style.height = this.scrollHeight + 'px';
})