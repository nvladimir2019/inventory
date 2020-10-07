class MoveInventory {

    constructor(httpClient) {
        this.httpClient = httpClient;
    }

    init() {
        this.btnMove = document.getElementById('btn-move');
        this.move = document.getElementById('move');
        this.close = document.querySelector('.btn-close');
        this.btnClose = document.getElementById('btn-close');

        this.bindEvents();
    }

    bindEvents() {
        this.btnMove.addEventListener('click', () => {
            this.move.classList.add('active');
        });

        this.close.addEventListener('click', () => {
            this.move.classList.remove('active');
        });

        this.btnClose.addEventListener('click', e => {
            e.preventDefault();
            this.move.classList.remove('active');
        });
    }
}

let moveInventory = new MoveInventory(httpClient);
window.addEventListener('load', () => moveInventory.init());

