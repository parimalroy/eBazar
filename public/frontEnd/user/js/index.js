/**
* Uses my experimental, modular and far from ready JavaScript framework :)
*/

//select the modules to use
I.use('core');
I.use('validation');
I.use('events');
I.use('selectors');

//wait for all the modules to be loaded
I.go(function() {
  I.bind('change keyup blur focus').to('input', function(e) {
    if (I.am.valid(e)) {
      e.srcElement.className = 'valid';
    } else if (e.type === 'blur') {
      e.srcElement.className = 'error';
    } else if (I.am.empty(e.srcElement.value)) {
      e.srcElement.className = 'warning';
    } else {
      e.srcElement.className = '';
    }
  });

  I.bind('click').to('input[type="submit"]', function(e) {
    var inputs = I.select('input');
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].focus();
    }
    if (I.select('input.error').length) {
      e.preventDefault();
    }
    //always nu-uh submit on codepen ;)
    e.preventDefault();
  });
});