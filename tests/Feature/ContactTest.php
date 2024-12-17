<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Contact;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function authenticated_user_can_add_a_contact()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('contacts.store'), [
            'name' => 'Contato Teste',
            'contact' => '123456789',
            'email' => 'test@example.com',
        ]);

        $response->assertRedirect('/'); 

        $this->assertDatabaseHas('contacts', [
            'name' => 'Contato Teste',
            'contact' => '123456789',
            'email' => 'test@example.com',
        ]);
    }

    
    public function adding_a_contact_requires_valid_data()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('contacts.store'), [
            'name' => '', 
            'contact' => '12345', 
            'email' => 'invalid-email', 
        ]);

        $response->assertSessionHasErrors(['name', 'contact', 'email']);
    }

    public function authenticated_user_can_edit_a_contact()
    {
        $this->actingAs($this->user);

        $contact = Contact::factory()->create();

        $response = $this->put(route('contacts.update', $contact->id), [
            'name' => 'Contato Atualizado',
            'contact' => '987654321',
            'email' => 'updated@example.com',
        ]);

        $response->assertRedirect('/'); 

        $this->assertDatabaseHas('contacts', [
            'name' => 'Contato Atualizado',
            'contact' => '987654321',
            'email' => 'updated@example.com',
        ]);
    }

    public function guest_cannot_access_create_or_edit_pages()
    {
        $responseCreate = $this->get(route('contacts.create'));
        $responseCreate->assertRedirect(route('login'));

        $contact = Contact::factory()->create();
        $responseEdit = $this->get(route('contacts.edit', $contact->id));
        $responseEdit->assertRedirect(route('login'));
    }
}
