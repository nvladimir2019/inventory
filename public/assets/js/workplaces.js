class Workplaces {
    constructor(httpClient) {
        this.httpClient = httpClient;
    }

    getWorkplaces(callback) {
        this.httpClient.getJson("/api/workplaces", callback);
    }

    getBuilding(workplaceId) {
        this.httpClient.postJson("/api/get/building", {workplaceId}, (b)=> {
            this.buildings(b);
        });
    }

    buildings(b) {
        let selectBuilding = document.getElementById('building');
        let buildings = "";
        b.forEach((building) => {
            buildings += "<option value='"+building.id+"'>"+building.name+"</option>"
        });
        selectBuilding.disabled = false;
        selectBuilding.innerHTML = buildings;
    }
}

class GetWorkplacesFiltersRequest {
    constructor() {
        this.filial = null;
        this.building = null;
        this.floor = null;
        this.room = null;
        this.department = null;
    }
}

class FiltersWorkplaces {
    constructor(workplaces) {
        this.workplaces = workplaces;
    }

    init() {
        this.filters = document.getElementById('filters-workplace');
        this.selects = {
            filial: document.getElementById('filial'),
            building: document.getElementById('building'),
            floor: document.getElementById('floor'),
            room: document.getElementById('room'),
            department: document.getElementById('department')
        };

        this.bindEvents();
    }

    bindEvents() {
        this.selects.filial.addEventListener('change', e=> {
            this.getBuilding(e);
            // this.getWorkplaces();
        })
    }



    getBuilding(e) {
        let workplaceId = e.target.value;
        let buildings = this.workplaces.getBuilding(workplaceId);
    }

    getWorkplaces() {
        let filters = new GetWorkplacesFiltersRequest;
        filters.filial = this.selects.filial.value === "-1" ? null : parseInt(this.selects.filial.value);
        filters.building = this.selects.building.disabled ? null : this.selects.building.disabled
    }
}

let httpClient = new HttpClient();
let workplaces = new Workplaces(httpClient);
let filterWorkplaces = new FiltersWorkplaces(workplaces);
window.addEventListener("load", () => filterWorkplaces.init());

