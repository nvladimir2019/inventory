class AddInventory {

    constructor(getDataInventory) {
        this.getDataInventory = getDataInventory;
    }

    init() {
        this.addInventory = document.getElementById('add-inventory');
        this.btnAddInventory = document.getElementById('btn-add-inventory');
        this.btnClose = document.querySelectorAll('.btn-close');
        this.type = document.getElementById('type');
        this.manufacturer = document.getElementById('manufacturer');

        this.bindsEvents();
    }

    bindsEvents() {
        this.btnAddInventory.addEventListener('click', () => {
            this.addInventory.classList.add('active');
        });

        this.btnClose.forEach(b => {
            b.addEventListener('click', e => {
                e.preventDefault();
                this.addInventory.classList.remove('active');
            });
        });

        this.type.addEventListener('change', () => {
            let type = this.type.value;
            let manufacturer = this.manufacturer.value;
            this.getModels(type, manufacturer);
        });

        this.manufacturer.addEventListener('change', () => {
            let type = this.type.value;
            let manufacturer = this.manufacturer.value;
            this.getModels(type, manufacturer);
        });
    }

    getModels(type, manufacturer) {
        let filters = new Filters();

        if(type !== '-1') {
            filters.type = type;
        }

        if(manufacturer !== '-1') {
            filters.manufacturer = manufacturer;
        }
        this.getDataInventory.getModels(filters);
    }
}

class GetDataInventory {
    constructor(httpClient) {
        this.httpClient = httpClient;
        this.models = document.getElementById('model');
    }

    getModels(filters) {
        this.httpClient.postJson('/api/get/models', filters, (m) => {
            this.insertModels(m);
        });
    }

    insertModels(m) {
        let models = "<option value='-1'>Выберите модель</option>";
        m.forEach((model) => {
            models += `<option value="${model.id}">${model.name}</option>`;
        });
        this.models.innerHTML = models;
    }
}

class Filters {
    type = null;
    manufacturer = null;
}

let httpClient = new HttpClient();
let getDataInventory = new GetDataInventory(httpClient);
let addInventory = new AddInventory(getDataInventory);
window.addEventListener("load", () => addInventory.init());
