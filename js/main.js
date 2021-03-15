window.addEventListener('load', init);

function init()
{

}


function createPlayField()
{
    for (let i = 0; i < 4; i++) {
        let playfield = document.getElementById('playing-field');

        let card = document.createElement('div');
        card.classList.add('playing-card');
        playfield.appendChild(card);

        let img = document.createElement('img');
        img.setAttribute('src', './img/vraagteken-plaatjes.png')
        // img.src = './img/vraagteken-plaatjes.png'
        card.appendChild(img)

        let title = document.createElement('h2');
        title.innerText = i
        card.appendChild(title)
    }
}