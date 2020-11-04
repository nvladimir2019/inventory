class GetInventory {

    constructor(httpClient, paginator) {
        this.httpClient = httpClient;
        this.paginator = paginator;
    }

    init() {
        this.checkWithInventoryNumbers = document.getElementById('with-inventory-numbers');
        this.workplaceId = document.getElementById('workplace-id').value;
        this.tableInventory = document.getElementById('table-inventory');
        this.pagination = document.getElementById('pagination');

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

        this.pagination.addEventListener('click', e => {
            let closest = e.target.closest('li');
            if(closest.classList.contains('active') || closest.classList.contains('disabled')) return;

            if(e.target.classList.contains('page-link')) {
                let page = e.target.dataset.page;

                if(this.checkWithInventoryNumbers.checked === true) {
                    this.withInventoryNumbers(page);
                }
                else {
                    this.byWorkplaceId(page);
                }
            }
        });
    }

    withInventoryNumbers(page = 1) {
        let workplaceId = this.workplaceId;
        this.httpClient.postJson('/api/get/inventory/withInventoryNumbers', {workplaceId, page}, (i) => {
            this.insertInventory(i);
        });
    }

    byWorkplaceId(page = 1) {
        let workplaceId = this.workplaceId;
        this.httpClient.postJson('/api/get/inventory/byWorkplaceId', {workplaceId, page}, (i) => {
            this.insertInventory(i);
        });
    }

    insertInventory(i) {
        let inventory = "";
        i.inventory.data.forEach(inv => {
            inventory += `<tr>
                <td>${inv.model.type.name}</td>
                <td>${inv.model.manufacturer.name}</td>
                <td>${inv.model.name}</td>
                <td>${inv.buhcode}</td>
                <td><a href="/inventory/read/${inv.id}">Подробнее</a></td>
            </tr>`;
        });
        this.tableInventory.innerHTML = inventory;
        this.pagination.innerHTML = this.paginator.render(i.paginator, i.inventory.current_page, i.inventory.last_page)

    }
}

let paginator = new Paginator();
let getInventory = new GetInventory(httpClient, paginator);
window.addEventListener('load', () => {
    getInventory.init();
    getInventory.byWorkplaceId();
});


