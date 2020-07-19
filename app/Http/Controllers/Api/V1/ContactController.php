<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Requests\AddContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;

class ContactController extends Controller
{
    // Добавление нового контакта
    public function addContact(AddContactRequest $request)
    {
        //Сохроняем контакт в БД
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'group' => $request->group,
            'user_id' => Auth::id()
        ]);
        //Возврщаем ответ
        return response()->json([
            'status' => true
        ])->setStatusCode(201, 'Contact is added');
    }

    //Получение списка контактов пользователя
    public function allContacts()
    {
        //Получаем список контактов из БД по id пользователя
        $contacts = Contact::where('user_id', Auth::id())->get();

        //Возврщаем статус и список с данными пользователей
        return response()->json([
            'status' => true,
            'contacts' => $contacts
        ])->setStatusCode(200, 'Contacts list');
    }

    //Получение списка контактов выбранной группы пользователя
    public function allGroup($group)
    {
        //Получаем список контактов из БД выбрвнной группы
        $contacts = Contact::where('group', $group)->where('user_id', Auth::id())->get();

        //Если контакт найден то...
        if($contacts->isNotEmpty()){
            //Успешныый Ответ: Возваращаем статус и список контактов выбрвнной группы
            return response()->json([
                'status' => true,
                'contacts' => $contacts
            ])->setStatusCode(200, 'Group list');
        }else{
            //Не успешный ответ
            return response()
                ->json([
                    'status' => false,
                ])
                ->setStatusCode(401, 'Group not found');
        }
    }

    //Получение одного контакта
    public function oneContact($id)
    {
        //Получаем выбранный(id) контакт из БД по id пользователя
        $contact = Contact::where('user_id', Auth::id())->find($id);
        //Если контакт найден то...
        if($contact){
            //Успешныый Ответ: Возваращаем статус и данные контакта
            return response()->json([
                'status' => true,
                'contacts' => $contact
            ])->setStatusCode(200, 'One contact');

        }else{
            //Не успешный ответ
            return response()
                ->json([
                    'status' => false,
                ])
                ->setStatusCode(401, 'Contact not found');
        }
    }

    //Удаление контакта
    public function deleteContact($id)
    {
        //Получаем выбранный(id) контакт из БД по id пользователя
        $contact = Contact::where('user_id', Auth::id())->find($id);
        //Если контакт найден то...
        if($contact){
            //Удаляем контакт из БД
            Contact::find($id)->delete();
            //Успешныый Ответ: Возваращаем статус
            return response()->json([
                'status' => true
            ])->setStatusCode(200, 'Contact deleted');

        }else{
            //Не успешный ответ
            return response()
                ->json([
                    'status' => false,
                ])
                ->setStatusCode(401, 'Contact not found');
        }
    }
    // Изменение данных контакта
    public function updateContact($id, UpdateContactRequest $request)
    {
        //Получаем выбранный(id) контакт из БД по id пользователя
        $contact = Contact::where('user_id', Auth::id())->find($id);

        //Если контакт найден то...
        if($contact){
            //Перезаписываем данные
            $contact->name = $request->input('name');
            $contact->phone = $request->input('phone');
            $contact->group = $request->input('group');
            $contact->user_id = Auth::id();
            //Сохраняем в БД
            $contact->save();

            //Успешныый Ответ: Возваращаем статус и контакт с измененными данными
            return response()->json([
                'status' => true,
                'contact' => $contact
            ])->setStatusCode(200, 'Contact deleted');

        }else{
            //Не успешный ответ
            return response()
                ->json([
                    'status' => false,
                ])
                ->setStatusCode(401, 'Contact not found');
        }
    }


}
