<script>
export default {
    data(){
        return{
            client_code:"",
            clinet: "",
            task_id:"",
            otp:"",
            show: false,
            error: '',
            status: [],
            task: '',
        }
    },
    methods:{
        verifyClient(){
            axios({
                url: '/api/verifyClient',
                data: {client_code:this.client_code,task_id:this.task_id},
                method: 'POST'
            }).then(response=>{
                this.task = response.data.id;
                console.log(this.task)
                if(this.task === undefined){
                    this.error = 'Invalid Credentials'
                    this.show = false
                }
                else{
                    this.show = true 
                    this.error = ''
                }
            })
        },
        verifyOtp(){
            axios({
                url: '/api/verifyOtp',
                data: {client_code:this.client_code,otp:this.otp},
                method: 'POST'
            }).then(response=>{
                this.client = response.data;
                console.log(typeof this.client)
                if(typeof this.client === 'string'){
                    if(this.client.trim().length === 0){
                        console.log('asdf')
                        this.error = "Invalid OTP"
                        this.show = false
                    }
                    else{
                        console.log('asdfs')
                        this.show = false 
                        this.error = ''
                    }
                }

                if(typeof this.client === 'object'){
                    this.fetchStatus()
                }
            })
        },
        fetchStatus(){
            axios({
                url: '/api/fetchStatus',
                data: {task_id:this.task_id},
                method: 'POST'
            }).then(response=>{
                this.status = response.data;
                console.log(this.status)
                this.show = false
            }) 
        }
    }
}
</script>
<template>
    <div>
        <div v-if="show" class="absolute w-screen justify-center border border-gray-200">
            <!-- Main modal -->
            <div class="overflow-y-auto overflow-x-hidden flex justify-center mt-10 fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class=" p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class=" bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Enter OTP
                            </h3>
                            <button @click="show=false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <input
                        type="text"
                        id="visitors"
                        v-model="otp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""
                        required
                    />
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button @click="verifyOtp" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Verify</button>
                            <button @click="show=false" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-screen px-3 py-2 shadow-md">
            <img src="https://www.b2bresolute.com/wp-content/uploads/2020/12/logo-resize.png" class="h-10" alt="Resolute Logo">
        </div>
        <div class="w-screen flex flex-col gap-6 justify-center items-center mt-10">
            <p class="text-xl font-bold">Enter You Details Here:</p>
            <p class="text-red-600">{{error}}</p>
            <div class="flex flex-col items-center lg:flex-row lg:justify-center gap-5 w-full">
                <div class="flex w-[20rem] gap-2 items-center">
                    <p class="w-[6rem]">Client Id:</p>
                    <input type="text" v-model="client_code" placeholder="Enter Your Id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                </div>
                <div class="flex w-[20rem] gap-2 items-center">
                    <p class="w-[5rem]">Task Id:</p>
                    <input type="text" v-model="task_id" placeholder="Enter Task Id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                </div>
            </div>
            <button @click="verifyClient" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>

        <div class="lg:px-[7rem]">
            <!-- timline -->
            <div class=" py-6 flex flex-col justify-center sm:py-12">
                <div class="py-3 sm:mx-auto w-full px-2 sm:px-0">
    
                    <div class="relative antialiased text-sm font-semibold">
    
                        <!-- Vertical bar running through middle -->
                        <div class="hidden sm:block w-1 bg-blue-300 absolute h-full left-1/2 transform -translate-x-1/2"></div>
                        <!-- @foreach($notes as $note) -->
                        <div v-for="(item,index) in status" :key="index" class="mt-6 sm:mt-0 sm:mb-12">
                            <div class="flex flex-col sm:flex-row items-center">
                                <div :class="`${index%2==0? 'justify-start':'justify-end'} flex w-full mx-auto items-center`">
                                    <div class="w-full sm:w-1/2 sm:pr-8">
                                        <!-- <p class="ml-2">2022-10-03 07:12:44</p> -->
                                        <div class="p-6 bg-white rounded shadow-xl">
                                            {{item.status}}
                                        </div>
                                    </div>
                                </div>
                                <p :class="`${index%2==0? 'w-[20%] sm:w-[60%] lg:w-[60%]':'w-[20%] sm:w-[40%] lg:w-[45%]'} ml-2 absolute flex justify-end`">{{item.created_at.substring(0,10)}}</p>
                                <div class="rounded-full hidden lg:flex bg-blue-500 border-white border-4 w-8 h-8 absolute left-1/2 -translate-y-4 sm:translate-y-0 transform -translate-x-1/2 items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- @endforeach -->
                    </div>
                </div>
            </div>
            <!-- endtimeline -->
        </div>
    </div>
</template>