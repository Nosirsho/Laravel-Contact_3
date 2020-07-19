<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //Добавление контакта
    public function addContact(ContactRequest $request)
    {
        //Получаем данные и сохраняем контакт в БД
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->group = $request->input('group');
        $contact->user_id = Auth::id();

        $contact->save();
        //Возвращаемся на страницу с формой добавление контакта
        return redirect()->route('home')->with('success',  "Контакт добавлен.");
    }

    //Получение списка контактов
    public function allContacts()
    {
        //Перенаправляем на страницу со списком контктов
         return view('contacts', ['data' => Contact::all()->where('user_id', Auth::id())->sortBy('name')]);
    }

    //Получение списка Группы контактов
    public function allGroup()
    {
        $results = Contact::select('group', \DB::raw('COUNT(id) as amount'))
            ->where('user_id', Auth::id())
            ->groupBy('group')
            ->get();
        // return dd($results);

        //Перенаправляем на страницу со списком Группы
          return view('groups', ['data' => $results]);
    }

    //Получение выбранной группы со списком контактов
    public function oneGroup($group)
    {
        $results = Contact::all()->where('user_id', Auth::id())->where('group', $group);

        //Перенаправляем на страницу выбранной группы со списком контактов
        return view('contacts', ['data' => $results]);
    }

    //Получаем один выбранный контакт
    public function showOneContact($id)
    {
        $contact = new Contact();
        //Перенаправляем на страницу выбранного контакта
        return view('one-contact', ['data' => $contact->find($id)]);
    }

    public function updateContact($id)
    {
        $contact = new Contact();
        return view('update-contact', ['data' => $contact->find($id)]);
    }

    //Изменяем данные контакта
    public function updateContactSubmit($id, ContactRequest $request)
    {
        //Находим контакт
        $contact = Contact::find($id);
        //Изменяем данные контакта
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->group = $request->input('group');
        $contact->user_id = Auth::id();
        //Сохраняем в БД
        $contact->save();
        //Перенаправляем на страницу с одним выбранным контактом
        return redirect()->route('contact_one', $id);
    }

    //Удаление Контакта
    public function deleteContact($id)
    {
        //Находим контакт по id и удаляем
        Contact::find($id)->delete();
        //Перенаправляем на страницу со всеми контактами
        return redirect()->route('contact_all');
    }

}
