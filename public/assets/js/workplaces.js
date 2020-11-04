class Workplaces {
    constructor(httpClient, paginator) {
        this.httpClient = httpClient;
        this.paginator = paginator;
    }

    getWorkplaces(filters) {
        this.httpClient.postJson("/api/get/workplaces", filters, (w) => {
            let workplaces = '';
            w.workplaces.data.forEach((workplace) => {
                workplaces += `<tr><th scope="row"><a href="/workplaces/read/${workplace.id}">${workplace.name}</a></th>
                <td><a href="/workplaces/edit/${workplace.id}">Редактировать</a></td></tr>`;
            });

            document.getElementById('workplaces').innerHTML = workplaces;
            document.getElementById('pagination').innerHTML = this.paginator.render(
                w.paginator,
                w.workplaces.current_page,
                w.workplaces.last_page
            );
        });
    }

    getBuilding(filialId) {
        this.httpClient.postJson("/api/get/building", {filialId}, (b)=> {
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
        this.page = null;
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
        this.pagination = document.getElementById('pagination');

        this.bindEvents();
    }

    bindEvents() {
        this.selects.filial.addEventListener('change', e => {
            this.getBuilding(e);
            this.getWorkplaces('filial');
        });

        this.selects.building.addEventListener('change', e => {
            this.getFloor(e);
            this.getWorkplaces('building');
        });

        this.selects.floor.addEventListener('change', e => {
            this.getRoom(e);
            this.getWorkplaces('floor');
        });

        this.selects.room.addEventListener('change', e => {
            this.getWorkplaces('room');
        });

        this.selects.department.addEventListener('change', e => {
            this.getWorkplaces('department');
        });

        this.pagination.addEventListener('click', e => {
            let closest = e.target.closest('li');
            if(closest.classList.contains('active') || closest.classList.contains('disabled')) return;

            if(e.target.classList.contains('page-link')) {
                let page = e.target.dataset.page;

                this.getWorkplaces(null, page);
            }
        });
    }


    getBuilding(e) {
        let filialId = e.target.value;
        if (filialId === '-1') {
            this.selects.building.innerHTML = "<option value='-1'>Здание</option>";
            this.selects.building.disabled = true;
        } else {
            this.workplaces.getBuilding(filialId);
        }

        this.selects.floor.innerHTML = "<option value='-1'>Этаж</option>";
        this.selects.floor.disabled = true;
        this.selects.room.innerHTML = "<option value='-1'>Комната</option>";
        this.selects.room.disabled = true;
    }

    getFloor(e) {
        this.selects.room.innerHTML = "<option value='-1'>Комната</option>";
        this.selects.room.disabled = true;

        let buildingId = e.target.value;
        if (buildingId === '-1') {
            this.selects.floor.innerHTML = "<option value='-1'>Этаж</option>";
            this.selects.floor.disabled = true;
        } else {
            this.workplaces.getFloor(buildingId);
        }
    }

    getRoom(e) {
        let floorId = e.target.value;
        if (floorId === '-1') {
            this.selects.room.innerHTML = "<option value='-1'>Комната</option>";
            this.selects.room.disabled = true;
        } else {
            this.workplaces.getRoom(floorId);
        }
    }

    getWorkplaces(select = null, page = 1) {
        let filters = new GetWorkplacesFiltersRequest();
        filters.filial = this.selects.filial.value === "-1" ? null : parseInt(this.selects.filial.value);
        filters.building = this.selects.building.disabled
            ? null
            : this.selects.building.value === '-1'
                ? null
                : parseInt(this.selects.building.value);
        filters.floor = this.selects.floor.disabled
            ? null
            : this.selects.floor.value === '-1'
                ? null
                : parseInt(this.selects.floor.value);
        filters.room = this.selects.room.disabled
            ? null
            : this.selects.room.value === '-1'
                ? null
                : parseInt(this.selects.room.value);
        filters.department = this.selects.department.value === '-1' ? null : parseInt(this.selects.department.value);

        let filter = {};
        if (select === 'filial') {
            filter = {
                'filial': filters.filial,
                'department': filters.department
            };
        } else if (select === 'building') {
            filter = {
                'building': filters.building,
                'department': filters.department
            };
        } else if (select === 'floor') {
            filter = {
                'floor': filters.floor,
                'department': filters.department
            };
        } else if (select === 'room') {
            filter = {
                'room': filters.room,
                'department': filters.department
            };
        } else if (select === 'department') {
            filter = filters;
        } else if (select === null) {
            filter = filters;
        }

        filter.page = page;

        this.workplaces.getWorkplaces(filter);
    }
}

let httpClient = new HttpClient();
let paginator = new Paginator();
let workplaces = new Workplaces(httpClient, paginator);
let filterWorkplaces = new FiltersWorkplaces(workplaces);
window.addEventListener("load", () => {
    filterWorkplaces.init();
    filterWorkplaces.getWorkplaces();
});

