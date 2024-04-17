import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { useForm, usePage } from "@inertiajs/react";
import * as React from 'react';




export default function UpdateProfileName() {
  const user = usePage().props.auth.user;

  const { data, setData, errors,  processing, patch } = useForm({
    first_name: user.first_name,
    last_name: user.last_name,
    fathers_name: user.fathers_name,
    sex: user.sex,
    birthday: user.birthdate,
    phone:user.mobile_phone,
    email:user.email,
  });

  const submit = (e) => {
    e.preventDefault();
  
    patch(route('profile.update'), data); // Добавьте скобки для вызова функции patch
  };
  return (
    <section>
      <header className="flex w-auto text-clip">
        <h2 className="text-lg font-medium text-gray-900 w-1/2">Информация о профиле</h2>
      </header>


      <form onSubmit={submit} className="mt-6 space-y-6" >
        <div className="flex ">
          <div>
            <InputLabel htmlFor='first_name' value='Имя' />
            <TextInput
              id='first_name'
              className="mt-1 block w-full "
              value={data.first_name}
              autoComplete='first_name'
              disabled
            />
          </div>
          <div className="ml-10">
            <InputLabel htmlFor='last_name' value='Фамилия' />
            <TextInput
              id='last_name'
              className="mt-1 block w-full "
              value={data.last_name}
              autoComplete="last_name"
              disabled
            />
          </div>
        </div>
        <div>
          <InputLabel htmlFor='father_name' value='Отчество' />
          <TextInput
            id='father_name'
            className="mt-1 block "
            value={data.fathers_name}
            autoComplete="father_name"
            disabled
          />
        </div>
        <div className="flex ">
          <div>
            <InputLabel htmlFor='birthday' value='Дата рождения' />
            <TextInput
              id='birthday'
              className="mt-1 block w-full"
              value={data.birthday}
              autoComplete="birthday"
              disabled
            />
          </div>
          <div className="ml-10">
            <InputLabel htmlFor='data_sex' value='Пол' />
            <TextInput
              id='data_sex'
              className="mt-1 block w-full"
              value={data.sex}
              autoComplete="sex"
              disabled
            />
          </div>
        </div>
        <div className="flex">
          <div>
            <InputLabel htmlFor='phone' value='Номер телефона' />
            <TextInput
              id='phone'
              className="mt-1 block w-full"
              value={data.phone}
              onChange={(e) => setData('phone', e.target.value)}
              required
              isFocused
              autoComplete="phone"

            />
            <InputError className="mt-2" message={errors.phone} />
          </div>
          <div className="ml-10">
            <InputLabel htmlFor='email' value='Электронная почта' />
            <TextInput
              id='email'
              className="mt-1 block w-full"
              type="email"
              value={data.email}
              onChange={(e) => setData('email', e.target.value)}
              required
              isFocused
              autoComplete='email'

            />
            <InputError className="mt-2" message={errors.email} />
          </div>
        </div>
        <PrimaryButton disabled={processing}>Сохранить</PrimaryButton>
      </form>


    </section>

  )
}
