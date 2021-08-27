<div class="container">
    <div class="cadr">
        <div class="row">
            <div class="f">
                <form method="post">
                    <div class="form-group" style="margin-bottom: 60px;margin-top: 60px">
                        <el-input v-model="type.name" class="input" placeholder=" اسم الوصفة في اللغة الفرنسية"
                            name="name">
                    </div>
                    <div class="form-group" style="margin-bottom: 60px;margin-top: 60px">
                        <el-input v-model="type.name_ar" class="input" placeholder=" اسم الوصفة بالعربي" name="name_ar">
                    </div>
                    <a v-if="open.buttonedittype" class="button-form" @click.prevent="updateType"
                        style="background-color: aqua">تحديث</a>
                    <a v-else class="button-form" @click.prevent="addType">أضف</a>
                </form>
            </div>
        </div>
    </div>
</div>
