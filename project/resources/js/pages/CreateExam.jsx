import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import { useForm } from "@inertiajs/react";
import * as React from 'react';

import TextField from '@mui/material/TextField';
import Autocomplete from '@mui/material/Autocomplete';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';
import { AdapterDayjs } from '@mui/x-date-pickers/AdapterDayjs';
// import { AdapterLuxon } from '@mui/x-date-pickers/AdapterLuxon';
import { DateCalendar } from '@mui/x-date-pickers/DateCalendar';
import { createTheme, ThemeProvider } from '@mui/material/styles';

// import { ruRU as dataGridruRU } from '@mui/x-data-grid';
import { ruRU as coreruRU } from '@mui/material/locale';
import { ruRU } from '@mui/x-date-pickers/locales';
import * as dayjs from 'dayjs'

import updateLocale from 'dayjs/plugin/updateLocale';
import { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import axios from 'axios';



export default function CreateExam({ auth, methods, methodology, workTime, seansTime }) {
    dayjs.extend(updateLocale);
    dayjs.updateLocale('en', {
        // Sunday = 0, Monday = 1.
        weekStart: 1,
    });


    const theme = createTheme(
        {
            components: {
                MuiPickersDay: {
                    styleOverrides: {
                        root: {
                            color: 'black',
                            borderRadius: '8px',
                            borderWidth: '1px',
                            borderColor: '#2196f3',
                            border: '1px solid',
                            backgroundColor: 'white',
                            localization: 'ru'
                        }
                    }
                }
            }
        },
        ruRU,
        // dataGridruRU,
        coreruRU
    );

    const submit = (e) => {
        e.preventDefault();
    };

    const { data, setData } = useForm({
        methoData: null,
        methodolodyData: null,
        employeeData: null,
        dayData: null,
        date: dayjs()
    });

    const formatingData = data.date.format('YYYY-MM-DD');



    const methodList = methods.map((elem) => ({ label: elem.name, id: elem.method_id }));

    const methodologyList = methodology.filter((elem) => elem.method_id === data.methoData).map((elem) => ({ label: elem.name, id: elem.methodology_id }));

    const EmployerList = (methodology.find((elem) => elem.methodology_id === data.methodolodyData) || { employees: [] }).employees
        .map((elem) => ({ label: ` ${elem.last_name} ${elem.first_name} ${elem.fathers_name}`, id: elem.employee_id }));


    const getDates = () => {
       axios.get(route('create.dates', {
            method: data.methoData,
            year: data.date.format('YYYY'),
            month: data.date.format('MM'),
            empoloyee: data.employeeData,
        })).then((response) => { setWorkTimes(response.data) });
    };

    const [WorkTimes, setWorkTimes] = useState(() => {
        const elem = workTime.filter((elem) => elem.date == formatingData) || {};
        let rows = [];
        const timeStart = dayjs(elem.time_start)
        const timeEnd = dayjs(elem.time_end)

        for (let time = timeStart; time < timeEnd; time = time.add(20, 'minute')) {
            rows.push(time.format('hh:mm'))
        }
        console.log(rows)
        return rows
    })



    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <section>
                <div className="py-12">
                    <div className="max-w-9xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div className="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <header className="flex w-auto text-clip">
                                <h2 className="text-lg font-medium text-gray-900 w-1/2">Запись на прием</h2>

                            </header>

                            <Head title="CreateExam" />
                            <form onSubmit={submit} className="mt-6 space-y-6" >
                                <div className="flex ">

                                    <div>
                                        <InputLabel htmlFor='method' value='Метод обследования' />
                                        <Autocomplete
                                            disablePortal
                                            id="method"
                                            options={methodList}
                                            onChange={(e, newValue) => {
                                                setData('methoData', newValue ? newValue.id : null);
                                            }}
                                            isOptionEqualToValue={(option, value) => option.id === value}
                                            className="mt-5 block w-full"
                                            sx={{ width: 300 }}
                                            renderInput={(params) => <TextField {...params} label="Выберите метод обследования" />}
                                        />

                                    </div>
                                    <div className="ml-10">
                                        <InputLabel htmlFor='methodology' value='Направление' />
                                        <Autocomplete
                                            disablePortal
                                            id="methodology"
                                            options={methodologyList}
                                            className="mt-1 block w-full mt-5"
                                            onChange={(e, newValue) => {
                                                setData('methodolodyData', newValue ? newValue.id : null);
                                            }}
                                            isOptionEqualToValue={(option, value) => option.id === value}
                                            sx={{ width: 300 }}
                                            renderInput={(params) => <TextField {...params} label="Выберите направление" />}
                                        />
                                    </div>
                                </div>
                                <div>
                                    <InputLabel htmlFor='employ' value='Врач' />
                                    <Autocomplete
                                        disablePortal
                                        id="employ"
                                        options={EmployerList}
                                        className="mt-1 block w-full mt-5"
                                        onChange={(e, newValue) => {
                                            setData('employeeData', newValue ? newValue.id : null);
                                        }}
                                        isOptionEqualToValue={(option, value) => option.id === value}
                                        sx={{ width: 300 }}
                                        renderInput={(params) => <TextField {...params} label="Выберите врача" />}
                                    />
                                </div>
                                <div className="flex ">
                                    <div>
                                        <InputLabel htmlFor='data' value='Дата' />
                                        <ThemeProvider theme={theme}>
                                            <LocalizationProvider dateAdapter={AdapterDayjs} adapterLocale='ru' localeText={ruRU.components.MuiLocalizationProvider.defaultProps.localeText}>
                                                <DateCalendar

                                                    format="MM-DD-YYYY"
                                                    value={data.date}
                                                    onChange={(newValue) => {
                                                        setData('date', newValue);
                                                        getDates()
                                                    }}
                                                />
                                            </LocalizationProvider>
                                        </ThemeProvider>

                                    </div>
                                    <div className="ml-10">
                                        <InputLabel htmlFor='time' value='Время' />
                                        <div>
                             
                                        </div>

                                    </div>
                                </div>
                                <PrimaryButton>Записаться</PrimaryButton>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </AuthenticatedLayout>
    );
}
