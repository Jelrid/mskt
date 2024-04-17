import PrimaryButton from "@/Components/PrimaryButton";
import * as React from 'react';

import { useForm, usePage } from "@inertiajs/react";



export default function MyExam() {
 
    const user = usePage().props.auth.user;

    

    return (
        <section>
            <header className="flex w-auto text-clip">
                <h2 className="text-lg font-medium text-gray-900 w-1/2">Информация о ваших обследованях</h2>

            </header>

            
                <a href="/createExam" className="btn btn-primary">
                    <PrimaryButton> 
                    Перейти к созданию экзамена
                    </PrimaryButton>
                </a>

            <div className="container flex space-x-10 mt-10 bg-gray-200 rounded-lg p-8">
                <div>
                    <p>Дата и время</p>
                    <p>12:03 22.02.24</p>
                </div>
                <div>
                    <p>Метод</p>
                    <p>ОЧень длинный метод который вы все всеанво не поймете и это не консультация а нечто совсем другое и новое</p>
                </div>
                <div>
                    <p>Зона</p>
                    <p>Ну типо ОЧень длинный метод который вы все всеанво не поймете и это не консультация а нечто совсем другое и новое</p>
                </div>
                <div>
                    <p>Кабинет</p>
                    <p>203</p>
                </div>
                <div>
                    <p>Врач</p>
                    <p>Lfyyst rjnjhsrtljv odpfjdis\gfh\dsgshgi\esw</p>
                </div>
                <div>
                    <p>ID</p>
                    <p>132</p>
                </div>
                <div>
                    <p>Статус</p>
                    <p>223</p>
                </div>
                <div>
                    <p>Примечание</p>
                    <p>Lfyyst rjnjhsrtljv odpfjdis\gfh\dsgshgi\esw</p>
                </div>

            </div>

        </section>

    )
}