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
        let buildings = "<option value='-1'>Здание</option>";
        b.forEach((building) => {
            buildings += `<option value='${building.id}'>${building.name}</option>`;
        });
        selectBuilding.disabled = false;
        selectBuilding.innerHTML = buildings;
    }

    getFloor(buildingId) {
        this.httpClient.postJson("/api/get/floor", {buildingId}, (f)=> {
            this.floors(f);
        })
    }

    floors(f) {
        let selectFloor = document.getElementById('floor');
        let floors = "<option value='-1'>Этаж</option>";
        f.forEach((floor) => {
            floors += `<option value='${floor.id}'>${floor.number}</option>`;
        });
        selectFloor.disabled = false;
        selectFloor.innerHTML = floors;
    }

    getRoom(floorId) {
        this.httpClient.postJson("/api/get/room", {floorId}, (r)=> {
            this.rooms(r);
        })
    }

    rooms(r) {
        let selectRoom = document.getElementById('room');
        let rooms = "<option value='-1'>Комната</option>";
        r.forEach((room) => {
            rooms += `<option value='${room.id}'>${room.placement}</option>`;
        });
        selectRoom.disabled = false;
        selectRoom.innerHTML = rooms;
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
        });

        this.selects.building.addEventListener('change', e=> {
            this.getFloor(e);
        });

        this.selects.floor.addEventListener('change', e=> {
            this.getRoom(e);
        });
    }



    getBuilding(e) {
        let workplaceId = e.target.value;
        if(workplaceId === '-1') {
            this.selects.building.innerHTML = "<option value='-1'>Здание</option>";
            this.selects.building.disabled = true;
            this.selects.floor.innerHTML = "<option value='-1'>Этаж</option>";
            this.selects.floor.disabled = true;
            this.selects.room.innerHTML = "<option value='-1'>Комната</option>";
            this.selects.room.disabled = true;
            return;
        }
        this.workplaces.getBuilding(workplaceId);
    }

    getFloor(e) {
        let buildingId = e.target.value;
        if(buildingId === '-1') {
            this.selects.floor.innerHTML = "<option value='-1'>Этаж</option>";
            this.selects.floor.disabled = true;
            this.selects.room.innerHTML = "<option value='-1'>Комната</option>";
            this.selects.room.disabled = true;
            return;
        }
        this.workplaces.getFloor(buildingId);
    }

    getRoom(e) {
        let floorId = e.target.value;
        if(floorId === '-1') {
            this.selects.room.innerHTML = "<option value='-1'>Комната</option>";
            this.selects.room.disabled = true;
            return;
        }
        this.workplaces.getRoom(floorId);
    }

    getWorkplaces() {
        let filters = new GetWorkplacesFiltersRequest;
        filters.filial = this.selects.filial.value === "-1" ? null : parseInt(this.selects.filial.value);
        filters.building = this.selects.building.disabled ? null : this.selects.building.disabled;
        filters.floor = this.selects.floor.disabled ? null : this.selects.floor.disabled;
        filters.floor = this.selects.room.disabled ? null : this.selects.room.disabled;
    }
}

let httpClient = new HttpClient();
let workplaces = new Workplaces(httpClient);
let filterWorkplaces = new FiltersWorkplaces(workplaces);
window.addEventListener("load", () => filterWorkplaces.init());

