class AddEmployee {
    constructor(getDataEmployee) {
        this.getDataEmployee = getDataEmployee;
    }

    init() {
        this.btnAddEmployee = document.getElementById('btn-add-employee');
        this.addEmployee = document.getElementById('add-employee');
        this.btnClose = document.querySelectorAll('.btn-close');

        this.bindsEvents();
        this.getDataEmployee.init();
    }

    bindsEvents() {
        this.btnAddEmployee.addEventListener('click', () => {
            this.addEmployee.classList.add('active');
        });

        this.btnClose.forEach(b => {
            b.addEventListener('click', e => {
                e.preventDefault();
                this.addEmployee.classList.remove('active');
            });
        });
    }
}

class GetDataEmployee {
    constructor(httpClient) {
        this.httpClient = httpClient;
    }

    init() {
        this.addEmployeeDepartment = document.getElementById('add-employee-department');
        this.addEmployeeWorkplace = document.getElementById('add-employee-workplace');

        this.bindsEvents();
    }

    bindsEvents() {
        this.addEmployeeDepartment.addEventListener('change', () => {
            let department = this.addEmployeeDepartment.value;
            if(department === '-1') {
                this.addEmployeeWorkplace.innerHTML = '<option value="-1">Выберите рабочее место</option>';
                this.addEmployeeWorkplace.disabled = true;
            }
            else {
                this.getWorkplace(department);
            }
        });
    }

    getWorkplace(department) {
        this.httpClient.postJson('api/get/workplaces/byDepartmentId', {department}, w => {
            this.insertWorkplace(w);
        });
    }

    insertWorkplace(wp) {
        let workplaces = '<option value="-1">Выберите рабочее место</option>';
        wp.forEach(w => {
            workplaces += `<option value="${w.id}">${w.name}</option>`;
        });
        this.addEmployeeWorkplace.innerHTML = workplaces;
        this.addEmployeeWorkplace.disabled = false;
    }
}

let httpClient = new HttpClient();
let getDataEmployee = new GetDataEmployee(httpClient);
let addEmployee = new AddEmployee(getDataEmployee);
window.addEventListener('load', () => {
    addEmployee.init();
});
