class AddWorkplace {
    constructor(getData) {
        this.getData = getData;
    }

    init() {
        this.filial = document.getElementById('add-workplace-filial');
        this.building = document.getElementById('add-workplace-building');
        this.floor = document.getElementById('add-workplace-floor');
        this.room = document.getElementById('add-workplace-room');
        this.btnAddWorkplace = document.getElementById('btn-add-workplace');
        this.addWorkplace = document.getElementById('add-workplace');
        this.btnClose = document.querySelectorAll('.btn-close');

        this.bindsEvents();
    }

    bindsEvents() {
        if(this.btnAddWorkplace !== null) {
            this.btnAddWorkplace.addEventListener('click', () => {
                this.addWorkplace.classList.add('active');
            });
        }

        this.btnClose.forEach(b => {
            b.addEventListener('click', e => {
                e.preventDefault();
                this.addWorkplace.classList.remove('active');
            });
        });

        this.filial.addEventListener('change', e => {
            this.getBuilding(e);
        });

        this.building.addEventListener('change', e => {
            this.getFloor(e);
        });

        this.floor.addEventListener('change', e => {
            this.getRoom(e);
        });
    }

    getBuilding(e) {
        let filialId = e.target.value;
        if (filialId === '-1') {
            this.building.innerHTML = "<option value='-1'>Выберите здание</option>";
            this.building.disabled = true;
        } else {
            this.getData.getBuilding(filialId);
            this.building.disabled = false;
        }

        this.floor.innerHTML = "<option value='-1'>Выберите этаж</option>";
        this.floor.disabled = true;
        this.room.innerHTML = "<option value='-1'>Выберите комнату</option>";
        this.room.disabled = true;
    }

    getFloor(e) {
        let buildingId = e.target.value;
        if(buildingId === '-1') {
            this.floor.innerHTML = "<option value='-1'>Выберите этаж</option>";
            this.floor.disabled = true;
        }
        else {
            this.getData.getFloor(buildingId);
            this.floor.disabled = false;
        }

        this.room.innerHTML = "<option value='-1'>Выберите комнату</option>";
        this.room.disabled = true;
    }

    getRoom(e) {
        let floorId = e.target.value;
        if(floorId === '-1') {
            this.room.innerHTML = "<option value='-1'>Выберите комнату</option>";
            this.room.disabled = true;
        }
        else {
            this.getData.getRoom(floorId);
            this.room.disabled = false;
        }
    }
}

class GetData {
    constructor(httpClient) {
        this.httpClient = httpClient;
    }

    getBuilding(filialId) {
        this.httpClient.postJson('/api/get/building', {filialId}, (b) => {
            this.insertBuilding(b);
        });
    }

    insertBuilding(b) {
        let building = "<option value='-1'>Выберите здание</option>";
        b.forEach((b) => {
            building += `<option value="${b.id}">${b.name}</option>`;
        });
        document.getElementById('add-workplace-building').innerHTML = building;
    }

    getFloor(buildingId) {
        this.httpClient.postJson('/api/get/floor', {buildingId}, (f) => {
            this.insertFloor(f);
        });
    }

    insertFloor(f) {
        let floor = "<option value='-1'>Выберите этаж</option>";
        f.forEach((f) => {
            floor += `<option value="${f.id}">${f.number}</option>`;
        });
        document.getElementById('add-workplace-floor').innerHTML = floor;
    }

    getRoom(floorId) {
        this.httpClient.postJson('/api/get/room', {floorId}, (r) => {
            this.insertRoom(r);
        });
    }

    insertRoom(r) {
        let room = "<option value='-1'>Выберите комнату</option>";
        r.forEach((r) => {
            room += `<option value="${r.id}">${r.placement}</option>`;
        });
        document.getElementById('add-workplace-room').innerHTML = room;
    }
}

let getData = new GetData(httpClient);
let addWorkplace = new AddWorkplace(getData);
window.addEventListener("load", () => addWorkplace.init());
