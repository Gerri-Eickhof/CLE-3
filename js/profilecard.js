const cardsContainer = document.getElementById('cards')
const books = [


]



function addCard(book){
    const cardDiv = document.createElement("div")
    cardDiv.classList.add("card")
    cardsContainer.appendChild(cardDiv)

    const img = document.createElement("img")
    img.src = book.image
    cardDiv.appendChild(img)

    const nameDiv = document.createElement("div")
    nameDiv.innerText = book.name
    cardDiv.appendChild(nameDiv)

    if(book.author){
        nameDiv.innerText = `${book.name} movie: ${book.author}`
    }
}

function addCards() {
    for (let book of books){
        addCard(book);
    }
}

addCards();