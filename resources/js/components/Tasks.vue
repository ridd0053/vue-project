<template>
    <div>
        <h1>Project innovation</h1>
        <h3 v-if="this.edit === false">Maak een taak aan</h3>
        <h3 v-if="this.edit === true">Wijzig een taak</h3>
        <form action="/api/task" class="form" @submit.prevent="addtask">
        <input type="hidden" name="_token" v-bind:value="csrf">
            <div class="row">
                <div class="form-group col-lg-4 ml-3">
                    <input  name="title" type="text" v-model="title"  class="form-control" placeholder="titel van je taak" required>
                </div>
            </div>
        <div class="row " v-if="this.edit === false">
            <div class="form-group col-lg-3 ml-3">
                <input  name="due_date" type="date" v-model="due_date"  class="form-control">
            </div>
            <my-btn text="maak aan" type="submit" class="ml-2"></my-btn>
        </div>
        <div class="row">
            <div class="form-group  ml-5" v-if="this.edit === true">
                <input  name="completed" type="radio" v-model="completed"  class="form-check-input" value="0" checked>
                <label class="form-check-label" for="completed">Niet compleet</label>
            
            </div>
            <div class="form-group  ml-5" v-if="this.edit === true">
                <input  name="completed" type="radio" v-model="completed"  class="form-check-input" value="1">
                <label class="form-check-label" for="completed">Compleet</label>
            
            </div>
        </div>
        <div class="row">
            <div class="form-group  ml-5" v-if="this.edit === true">
                <input  name="working_on" type="radio" v-model="working_on"  class="form-check-input" value="0" checked>
                <label class="form-check-label" for="working_on">Niet mee bezig</label>
            
            </div>
            <div class="form-group  ml-5" v-if="this.edit === true">
                <input  name="working_on" type="radio" v-model="working_on"  class="form-check-input" value="1">
                <label class="form-check-label" for="working_on">Mee bezig</label>
            
            </div>
        </div>
        <div class="row " v-if="this.edit === true">
            <div class="form-group col-lg-3 ml-3 my-3">
                <input  name="due_date" type="date" v-model="due_date"  class="form-control">
            </div>
            <my-btn text="Annuleer wijziging" type="submit" class="ml-2 mt-3" @click="cancelEdditing()"></my-btn>
            <my-btn text="Wijzig taak" type="submit" class="ml-2 mt-3"></my-btn>
        </div>
         
        </form>
      
     
        <h3 class="mt-2">Taken: </h3>
            <table class="table ">
                <thead class="thead-custom">
                    <tr>
                      <th>Titel van Taak</th>
                      <th >Einddatum</th>
                      <th>Compleetheid</th>
                      <th >Status</th>
                      <th >Acties</th>
                    </tr>
                </thead>      
                <tbody>
                    <tr v-for="task in tasks.data" :key="task.id">
                            <td >{{task.title}}</td>
                            <td>
                                  <span v-if="task.due_date === null"> onbekend</span>
                                  <span v-if="task.due_date !== null">{{moment(task.due_date).format(' DD-MM-YYYY')}}</span>
                            </td>
                            <td>
                                
                                <span v-if="task.completed === 0"> Niet compleet</span>
                                <span v-else-if="task.completed === 1"> Compleet</span>
                            </td>
                            <td> 
                                <span v-if="task.working_on === 1">Mee bezig</span>
                                <span v-else-if="task.working_on=== 0" class="">Niet mee bezig</span>
                            </td>
                            <td>
                                <div class=" btn edit-custom " @click="editTask(task)" >Bewerk </div>
                                <div class=" btn destroy-custom  " @click="confirmDelete(task)" >Verwijder </div>
                            </td>
                             
                        </tr>
                       
                    </tbody>
                   
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination ml-2 ">
                             
                   <li class="page-item disabled mr-3">
                       <a class="page-link text-dark " href="#">Pagina {{tasks.current_page}} van {{tasks.last_page}}</a>
                    </li>
            
                        <li v-bind:class="[{disabled: !tasks.prev_page_url}]" class="page-item ">
                            <a  class="page-link" href="#" @click="fetchTasks(tasks.first_page_url)">Eerste</a>
                        </li>
                        <li v-bind:class="[{disabled: !tasks.prev_page_url}]" class="page-item ">
                            <a  class="page-link" href="#" @click="fetchTasks(tasks.prev_page_url)">Vorige</a>
                        </li>
                        
               
                        <li v-bind:class="[{disabled: !tasks.next_page_url}]" class="page-item ">
                            <a  class="page-link" href="#" @click="fetchTasks(tasks.next_page_url)">Volgende</a>
                        </li>
                        <li v-bind:class="[{disabled: !tasks.next_page_url}]" class="page-item ">
                            <a  class="page-link" href="#" @click="fetchTasks(tasks.last_page_url)">Laatste</a>
                        </li>
                
                     </ul>
                </nav>
            
         </div>
   
</template>
<script>
let moment = require('moment');
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
let id;
export default {
    props: [
        'csrf'
    ],
   data(){
       
        return{
            moment:moment,
            tasks: {},
            edit: false,
            title:"",
            due_date:"",
            completed:"",
            working_on:"",
            pagination: {}
            
           
                 
        }
        
    },
       created(){
           this.fetchTasks();
                           
        // .then(response => this.tasks = response.data)
            
    },
        
    
    methods: {
    fetchTasks(page_url){
           
          page_url = page_url || '/api/task'
          axios.get(page_url).then(({data}) => (
          this.tasks = data
          
          
          ));

    },
   
  

     addtask(){
            if(this.edit === false){
            console.log('task added')
            axios.post('/api/task', {
                    title: this.title,
                    due_date: this.due_date,
                    method: 'post'
            })
            .then(function (response) {
                console.log(response);
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            })
        
    }
    else{
            console.log('task updated')
             axios.patch(`/api/task/${id}`, {
                    title: this.title,
                    due_date: this.due_date,
                    completed: this.completed,
                    working_on: this.working_on,
                   
            })
            .then(function (response) {
                console.log(response);
                console.log(this.completed);
                
                // location.reload();
            })
            
            
            .catch(function (error) {
                console.log(error);
            })
                    
            
            }

    
    this.title = "";
    this.due_date = "";   
     },
          
            
    
    editTask:function(task){
       this.edit = true;
       scroll(0,0)
       console.log(task.id)
            id = task.id
           this.title = task.title;
            this.due_date = task.due_date;
            this.completed = task.completed;
            this.working_on = task.working_on;
    },
    cancelEdditing:function(){
       this.edit = false;
    },

   confirmDelete:function(task){
        Swal.fire({
        title: 'Confirmatie voor verwijderen',
        text: `Weet je zeker dat je de taak  wilt verwijderen?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ja, ik weet het zeker!',
        cancelButtonText: 'Nee, liever niet'
        }).then((result) => {
        if (result.value) {
            console.log(task.id)
            axios.delete(`/api/task/${task.id}`).then(response => {
               Swal.fire({
                title: 'Verwijdering gelukt',
                text:'De taak is verwijderd!',
                icon: "success"
                }).then(function(){ 
                    location.reload();
                    });    
            });
        // For more information about handling dismissals please visit
        // https://sweetalert2.github.io/#handling-dismissals
               
            } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
            'Verwijdering geannuleerd',
            `De taak is niet verwijderd`,
            'error'
            )
            }
        })
    }

}
    
}


</script>
<style scoped>
    .pagination-custom{
        background-color: #cccccc; 
    }
    .thead-custom {
        background-color: #cccccc; 
        
    }
    .edit-custom {
        color: #fff;
        background-color: #6586aa;
        border-color: #6586aa;
    }
    .edit-custom:hover {
            color: #fff;
            background-color: #5693da;
            border-color: #5693da;
        }       
    .destroy-custom {
        color: #fff;
        background-color: #aa6765;
        border-color: #aa6765;
    }
      .destroy-custom:hover {
        color: #fff;
        background-color: #c53e39;
        border-color: #c53e39;
    }



</style>