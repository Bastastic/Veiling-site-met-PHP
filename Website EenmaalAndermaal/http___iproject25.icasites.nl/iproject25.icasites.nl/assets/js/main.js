document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {


    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }
});

function setModalVisibility(visible) {
  let activeClass = 'is-active';
  var element = document.getElementById("modal");
  var classList = element.classList;

  if(visible) {
    classList.add(activeClass);
  } else {
    classList.remove(activeClass);
    element.innerHTML = '';
  }
}

function getSource(url, callback) {
  xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET", url, true);
  xmlhttp.onreadystatechange = function()
  {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
    {
      callback(xmlhttp.responseText);
    }
  }
  xmlhttp.send();
}

function modalElementClicked(element) {
  var action = element.currentTarget.getAttribute('data-target');

  if(action == 'close') {
    setModalVisibility(false);
  } else {
    visitModal(action);
  }
}

function visitModal(name) {
  getSource("modals/"+name+".html", function(response) {
    document.getElementById("modal").innerHTML = response;
    var clickableElements = document.getElementsByClassName("modal-action");

    for(var element of clickableElements) {
      element.addEventListener("click", modalElementClicked);
    }
  });
}

document.getElementById("open-login").addEventListener("click", function() {
  visitModal('login');
  setModalVisibility(true);
});
