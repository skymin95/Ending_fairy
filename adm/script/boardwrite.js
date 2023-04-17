document.querySelector('#fileDoc').addEventListener('change', function(){
  document.querySelector('input[name=fileID]').value = this.value.split('\\')[2];
});