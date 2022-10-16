import { Component, OnInit } from '@angular/core';
import { DataService } from 'src/app/service/data.service';
import { Todo } from 'src/app/todo';



@Component({
  selector: 'app-todos',
  templateUrl: './todos.component.html',
  styleUrls: ['./todos.component.css']
})
export class TodosComponent implements OnInit {
  todos: any;
  todo = new Todo();
  todoUpComp = new Todo();

  constructor(private dataService: DataService) { }

  ngOnInit(): void {
    this.getTodos();
  }

  
  getTodos() {
    this.dataService.getData().subscribe(res => {
      this.todos = res;
    });
  }
  markComplete(id: any) {
    this.dataService.markComplete(id).subscribe(res => {
      this.getTodos();
    });
  }

  updateData(id: any) {
    this.dataService.updateData(id, this.todoUpComp).subscribe(res => {
      location.reload();
      this.getTodos();
      
    });
  }
  insertData() {
    this.dataService.insertData(this.todo).subscribe(res => {
      location.reload();
      this.getTodos();
    });
  }
  deleteData(id: any) {
    this.dataService.deleteData(id).subscribe(res => {
      this.getTodos();
    });
  }

}
