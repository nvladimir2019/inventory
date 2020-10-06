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
        this.accessory = document.getElementById('accessory');
        this.selectInventory = document.getElementById('select-inventory');

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

        this.accessory.addEventListener('change', e => {
            if(e.target.checked) {
                this.addFieldInventory();
            }
            else {
                this.removeFieldInventory();
            }
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

    removeFieldInventory() {
        this.selectInventory.innerHTML = "";
    }

    addFieldInventory() {
        this.selectInventory.innerHTML = '<label for="name">Инвентарь:*</label>' +
            '<select name="inventory" id="accessory-inventory" class="form-control">Выберите инвентарь</select>';
        this.getDataInventory.getInventory();
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

    getInventory() {
        this.httpClient.getJson('/api/get/inventory', i => {
            this.insertInventory(i);
        });
    }

    insertInventory(i) {
        let inventory = "";
        i.forEach(inv => {
            inventory += `<option value="${inv.id}">${inv.name}</option>`
        });
        document.getElementById('accessory-inventory').innerHTML = inventory;
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
