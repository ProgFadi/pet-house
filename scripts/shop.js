// // dummy data, demo
// let petsArray = [
//   {
//     category: "Cats",
//     name: "losa",
//     age: "5 months",
//     publisher: "P-A1",
//     image: "cat.jpg",
//     price: 150
//   },
//   {
//     category: "Cats",
//     name: "tota",
//     age: "6 months",
//     publisher: "P-A1",
//     image: "tota.jpg",
//     price: 155
//   },
//   {
//     category: "Dogs",
//     name: "bofy",
//     age: "8 months",
//     publisher: "P-A2",
//     image: "lofy.jpg",
//     price: 170
//   },
//   {
//     category: "Dogs",
//     name: "reo",
//     age: "7 months",
//     publisher: "P-A2",
//     image: "reo.jpg",
//     price: 244
//   },
//   {
//     category: "Monkeys",
//     name: "monk",
//     age: "1 year",
//     publisher: "P-A3",
//     image: "monk.jpg",
//     price: 500
//   },
//   {
//     category: "Birds",
//     name: "asfor",
//     age: "1 month",
//     publisher: "P-A4",
//     image: "asfor.jpg",
//     price: 800
//   },
//   {
//     category: "Birds",
//     name: "asfor",
//     age: "1 month",
//     publisher: "P-A4",
//     image: "asfor.jpg",
//     price: 800
//   }
// ];
// let filteredList = []; // for filtering purposes
// // for generating cards
// // get card

// let container = document.getElementById("cards-div-container");
// generateCards(petsArray);

// function generateCards(list) {
//   for (let i = 0; i < list.length; i++) {
//     let petCard = document.createElement("div");
//     petCard.classList.add("pet-card");
//     let img = document.createElement("img");
//     img.setAttribute("src", "./assets/images/" + list[i].image);
//     img.classList.add("pet-image-size");

//     //
//     let divDetails = document.createElement("div");
//     divDetails.classList.add("div-details");

//     let divDetailsSub = document.createElement("div");
//     divDetailsSub.classList.add("div-details-sub");

//     let petInfoDiv = document.createElement("div");
//     petInfoDiv.classList.add("pet-info");

//     let divPetInfoP1 = createDivInfoP("Category:", list[i].category);
//     let divPetInfoP2 = createDivInfoP("Name:", list[i].name);
//     let divPetInfoP3 = createDivInfoP("Age:", list[i].age);
//     let divPetInfoP4 = createDivInfoP("Publisher:", list[i].publisher);

//     petInfoDiv.append(divPetInfoP1, divPetInfoP2, divPetInfoP3, divPetInfoP4);

//     let seeMorePriceDiv = document.createElement("div");
//     seeMorePriceDiv.classList.add("see-more-price", "fit-div");
//     let a = document.createElement("a");
//     a.setAttribute("href", "#");
//     let pSeeMore = document.createElement("p");
//     pSeeMore.innerText = "See More";
//     pSeeMore.classList.add("pet-info-p-see-more");
//     a.appendChild(pSeeMore);

//     let span = document.createElement("span");
//     span.classList.add("pet-price");
//     span.innerText = "Price " + list[i].price + " $";
//     seeMorePriceDiv.append(a, span);
//     divDetailsSub.append(petInfoDiv, seeMorePriceDiv);

//     divDetails.appendChild(divDetailsSub);
//     petCard.appendChild(img);

//     petCard.appendChild(divDetails);

//     container.appendChild(petCard);
//   }
// }

// function createDivInfoP(title, value) {
//   let divPetInfoP = document.createElement("div");

//   divPetInfoP.classList.add("pet-info-p");
//   let pTitle = document.createElement("p");
//   pTitle.classList.add("title");
//   pTitle.innerText = title;

//   let pValue = document.createElement("p");
//   pValue.classList.add("pet-info-p-value");
//   pValue.innerText = value;

//   divPetInfoP.append(pTitle, pValue);

//   return divPetInfoP;
// }

// //  event listener
// let searchInput = document.getElementById("pets-search-input");
// searchInput.addEventListener("keyup", function() {
//   filteredList = [];
//   let value = searchInput.value;
//   if (value != undefined && value.length == 0) {
//     container.innerHTML = "";
//     generateCards(petsArray);
//   } else {
//     for (let i = 0; i < petsArray.length; i++) {
//       if (
//         petsArray[i].publisher
//           .toLocaleLowerCase()
//           .includes(value.toLocaleLowerCase()) ||
//         petsArray[i].name.toLowerCase().includes(value.toLowerCase())
//       ) {
//         // P-A4, value=A4,
//         filteredList.push(petsArray[i]);
//       }
//     }
//     container.innerHTML = "";
//     generateCards(filteredList);
//   }
// });
