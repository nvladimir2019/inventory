class GetInventory {

    constructor(httpClient) {
        this.httpClient = httpClient;
    }

    init() {
        this.checkWithInventoryNumbers = document.getElementById('with-inventory-numbers');
        this.workplaceId = document.getElementById('workplace-id').value;
        this.tableInventory = document.getElementById('table-inventory');

        this.bindEvents();
    }

    bindEvents() {
        this.checkWithInventoryNumbers.addEventListener('change', (e) => {
            if(e.target.checked) {
                this.withInventoryNumbers();
            }
            else {
                this.byWorkplaceId();
            }
        });
    }

    withInventoryNumbers() {
        let workplaceId = this.workplaceId;
        this.httpClient.postJson('/api/get/inventory/withInventoryNumbers', {workplaceId}, (i) => {
            this.insertInventory(i);
        });
    }

    byWorkplaceId() {
        let workplaceId = this.workplaceId;
        this.httpClient.postJson('/api/get/inventory/byWorkplaceId', {workplaceId}, (i) => {
            this.insertInventory(i);
        });
    }

    insertInventory(i) {
        let inventory = "";
        i.forEach(inv => {
            inventory += `<tr>
                <td>${inv.model.type.name}</td>
                <td>${inv.model.manufacturer.name}</td>
                <td>${inv.model.name}</td>
                <td>${inv.buhcode}</td>
                <td><a href="/inventory/read/${inv.id}">Подробнее</a></td>
            </tr>`;
        });
        this.tableInventory.innerHTML = inventory;
    }
}

let getInventory = new GetInventory(httpClient);
window.addEventListener('load', () => getInventory.init());


