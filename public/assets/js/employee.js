class Employee {
    constructor(httpClient, paginator) {
        this.httpClient = httpClient;
        this.paginator = paginator;
    }

    init() {
        this.searchEmployee = document.getElementById('search-employee');
        this.btnSearchEmployee = document.getElementById('btn-search-employee');
        this.department = document.getElementById('department');
        this.workplace = document.getElementById('workplace');
        this.pagination = document.getElementById('pagination');

        let filter = new Filter();
        this.getEmployees(filter);
        this.bindsEvents();
    }

    bindsEvents() {
        this.btnSearchEmployee.addEventListener('click', e => {
            e.preventDefault();
            let search = this.searchEmployee.value;
            console.log(search);
            //TODO:: Search employee by middle name
        });

        this.department.addEventListener('change', e => {
            let department = e.target.value;
            if(department === '-1') {
                this.workplace.innerHTML = '<option value="-1">Выберите рабочее место</option>';
                this.workplace.disabled = true;
            }
            else {
                this.getWorkplace(department);

                let filter = new Filter;
                filter.department = department;

                this.getEmployees(filter);
            }
        });

        this.workplace.addEventListener('change', e => {
            let workplace = e.target.value;
            let filter = new Filter;
            if(workplace === '-1') {
                let department = this.department.value;
                if(department !== '-1') {
                    filter.department = department;
                    this.getEmployees(filter);
                }
            }
            else {
                filter.workplace = workplace;

                this.getEmployees(filter);
            }
        });

        this.pagination.addEventListener('click', e => {
            let closest = e.target.closest('li');
            if(closest.classList.contains('active') || closest.classList.contains('disabled')) return;

            if(e.target.classList.contains('page-link')) {
                let page = e.target.dataset.page;
                let filter = new Filter();
                filter.page = page;
                if(this.workplace.value !== '-1') {
                    filter.workplace = this.workplace.value;
                }
                else if(this.department.value !== '-1') {
                    filter.department = this.department.value;
                }

                this.getEmployees(filter);
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
        this.workplace.innerHTML = workplaces;
        this.workplace.disabled = false;
    }

    getEmployees(filter) {
        this.httpClient.postJson('/api/get/employees', {filter}, data => {
            let employees = '';

            data.employees.data.forEach((employee) => {
                employees += `<tr><th scope="row"><a href="/employee/read/${employee.id}">${employee.surename} ${employee.first_name} ${employee.middle_name}</a></th>
                <td><a href="/employee/edit/${employee.id}">Редактировать</a></td></tr>`;
            });

            document.getElementById('employees').innerHTML = employees;
            document.getElementById('pagination').innerHTML = this.paginator.render(
                data.paginator,
                data.employees.current_page,
                data.employees.last_page
            );
        });
    }
}

class Filter {
    department = null;
    workplace = null;
    page = 1;
}

let paginator = new Paginator();
let employee = new Employee(httpClient, paginator);
window.addEventListener('load', () => {
    employee.init();
});
