@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .dragItem {
            width: 49%;
            margin-bottom: 2%;
            border-radius: 20px;
            border: 1px solid #c5ccce !important;
        }

        .dragItem>.card-body {}

        .myBtn {
            border: 0;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;

        }

        .handle {
            background: #53595e;
            position: relative;
            top: -14px;
            left: 1px;
            font-weight: 600;
        }

        .deleteBtn {
            position: absolute;
            right: 11px;
            top: 11px;
            background: #f85661;
        }

        .cardLists {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .deleteBtn:hover {
            background: #c0414a;
        }

    </style>
@stop

@section('page_title', 'FAQ')

@section('page_header')
<h1 class="page-title">
    <i class="voyager-bubble"></i>
    FAQ
</h1>
@include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-bordered" id="app">
                <div class="panel-body">
                    <p v-if="faqs.length<=0">Please Add Data</p>
                    <vue-draggable v-model="faqs" v-on:start="drag=true" v-on:end="drag=false" handle=".handle"
                        v-bind="dragOptions">
                        <transition-group class="cardLists" type="transition" :name="!drag ? 'flip-list' : null">
                            <div class="card dragItem" v-for="(element,key) in faqs" :key="key">
                                <div class="row card-body">
                                    <button class="myBtn handle">::Drag</button>
                                    <button class="myBtn deleteBtn" v-on:click="del(element)">✕</button>
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="name">Question @{{ key + 1 }}</label>
                                        <input type="text" v-model="element.question" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name" class="control-label">Answer @{{ key + 1 }}</label>
                                        <vue-ckeditor :editor="editor" v-model="element.answer" :config="editorConfig">
                                        </vue-ckeditor>
                                    </div>
                                </div>
                            </div>
                        </transition-group>

                    </vue-draggable>
                    <div style="display:flex">
                        <button class="btn btn-primary" style="margin-right:5px" v-on:click="addFaq">Add</button>
                        <button class="btn btn-success" :disabled="submitting" v-on:click="save">Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Delete File Modal -->
@stop

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sortablejs@1.8.4/Sortable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.24.3/vuedraggable.umd.js"
integrity="sha512-MPl1xjL9tTTJHmaWWTewqTJcNxl2pecJ0D0dAFHmeQo8of+F9uF7zb2bazCX7m45K3mKRg44L1xJDeFzjmjRtA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/plugins/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="{{ asset('js/plugins/@ckeditor/ckeditor5-vue2/dist/ckeditor.js') }}"></script>

<script>
    var app = new Vue({
        el: '#app',
        components: {
            'vue-draggable': vuedraggable,
            'vue-ckeditor': CKEditor.component
        },
        data: {
            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                // The configuration of the editor.
            },
            iterations: 1,
            respondedItems: [{
                inventory_id: -1,
                quantity: 0,
                unit: ""
            }],
            dataTypeContent: {},
            submitting: false,
            faqs: [{
                question: '',
                answer: ''
            }],
            toBeDeleted: [],
            drag: false
        },
        computed: {
            dragOptions() {
                return {
                    animation: 200,
                    group: "description",
                    disabled: false,
                    ghostClass: "ghost"
                };
            }
        },
        created() {
            this.faqs = @json($items)
        },
        methods: {
            del(element) {
                if (confirm(`Do you really want to question Question "${this.faqs.indexOf(element)+1}" ?`)) {
                    if (element.id) {
                        this.toBeDeleted.push(element.id);
                    }
                    this.faqs.splice(this.faqs.indexOf(element), 1)
                    toastr.success('Deleted! Save to finalize.')
                }
            },
            addFaq() {
                this.faqs.push({
                    question: '',
                    answer: ''
                })
            },
            save() {
                let that = this;
                this.submitting = true;
                axios.post('{{ route('faq.update') }}', {
                    items: this.faqs,
                    toBeDeleted: this.toBeDeleted
                }).then(function(response) {
                    that.submitting = false;
                    toastr.success(response.data.msg)
                })
            }
        }
    })
</script>
@stop
