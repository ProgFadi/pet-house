let liArray = document.getElementsByClassName("li-top-list"); // return array of li
console.log(liArray);
for (let i = 0; i < liArray.length; i++) {
  liArray[i].addEventListener("click", changeActiveClass);
}

function changeActiveClass() {
  // remove .active from all the tags
  for (let j = 0; j < liArray.length; j++) {
    if (liArray[j].classList.contains("active") == true) {
      liArray[j].classList.remove("active");
    }
    if (this == liArray[j]) {
      this.classList.add("active");
    }
  }
}
