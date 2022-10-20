<script>
import Multiselect from '@vueform/multiselect'
export default {
    components: {
        Multiselect
    },
    data(){
        return{
            clients: [],
            tasks: [],
            client: '',
            task: '',
            status: '',
            show: false
        }
    },
    mounted(){
        this.fetchClients()
    },
    watch:{
        client(val){
            this.fetchTasks();
            console.log(val);
        }
    },
    methods:{
        fetchClients(){
            axios.get("/api/clients").then((response) => {
                this.clients = response.data;
                console.log(this.clients);
            }); 
        },
        fetchTasks(){
            if(this.client){
                console.log('asf'+this.client)
                axios.get("/api/tasks/"+this.client).then((response) => {
                    this.tasks = response.data;
                    console.log(this.tasks);
                }); 
            }
        },
        addStatus(){
            axios({
                url: '/status',
                data: {task_id:this.task,status:this.status},
                method: 'POST'
            }).then(response=>{
                console.log(response.data);
            })
            this.status = '';
            this.show = true
            console.log(this.status)
            console.log(this.client)
        }
    }
}
</script>
<template>
    <div>
        <div class="w-full flex justify-start">
            <multiselect placeholder="Select Caller" v-model="client" :options="clients" :searchable="true"></multiselect>
            <multiselect placeholder="Select Task" v-model="task" :options="tasks" :searchable="true"></multiselect>
        </div>

        <div class="mt-10 mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
            <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea v-model="status" id="comment" rows="4" class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Add Status..." required=""></textarea>
            </div>
            <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
                <button @click="addStatus" type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Add Status
                </button>
            </div>
        </div>
        <p v-if="show" class="w-full flex justify-center text-green-700">Status Created Successfulyy!!!</p>
    </div>
</template>
<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.multiselect{
    width: 200px;
   }
</style>