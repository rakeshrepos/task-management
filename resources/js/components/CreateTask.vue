<script>
import Multiselect from '@vueform/multiselect'
export default {
    components: {
        Multiselect
    },
    data(){
        return{
            clients: ['rakeh','test','asdf','ras'],
            client: ''
        }
    },
    watch:{
        client(val){
            console.log(val)
        }
    }
}
</script>
<template>
    <div>
        <div class="w-full flex justify-start">
            <multiselect placeholder="Select Caller" v-model="client" :options="clients" :searchable="true"></multiselect>
        </div>

        <form class="mt-10">
            <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="4" class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Add Task..." required=""></textarea>
                </div>
                <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.multiselect{
    width: 200px;
   }
</style>