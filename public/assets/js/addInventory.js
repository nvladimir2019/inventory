class AddInventory {

    init() {
        this.addInventory = document.getElementById('add-inventory');
        this.btnAddInventory = document.getElementById('btn-add-inventory');
        this.btnClose = document.getElementById('add-inventory-close');

        this.bindsEvents();
    }

    bindsEvents() {
        this.btnAddInventory.addEventListener('click', () => {
            this.addInventory.classList.add('active');
        });

        this.btnClose.addEventListener('click', e => {
            e.preventDefault();
            this.addInventory.classList.remove('active');
        });
    }
}

let addInventory = new AddInventory();
window.addEventListener("load", () => addInventory.init());
