let aList = document.getElementsByClassName("filter-item");
let vendors = [
  {
    name: "A-1",
    category: "cats"
  },
  {
    name: "A-1",
    category: "cats"
  },
  {
    name: "A-1",
    category: "cats"
  },
  {
    name: "A-1",
    category: "cats"
  }
];

let filteredList = [];

for (let i = 0; i < aList.length; i++) {
  aList[i].addEventListener("click", function() {
    filteredList = []; // clear the list
    console.log(aList[i].attributes.id.value);
    let value = aList[i].attributes.id.value;
    if (value != undefined && value.length == 0) {
      container.innerHTML = "";
      generateCards(vendors);
    } else {
      for (let i = 0; i < vendors.length; i++) {
        if (
          vendors[i].publisher
            .toLocaleLowerCase()
            .includes(value.toLocaleLowerCase())
        ) {
          // P-A4, value=A4,
          filteredList.push(vendors[i]);
        }
      }
      container.innerHTML = "";
      generateCards(filteredList);
    }
  });
}

function generateCards(list) {}
